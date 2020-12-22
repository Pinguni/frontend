<?php

namespace App\Http\Controllers;

use Cache;
use Help;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cacheKey = 'courses.all';

        $courses = Cache::remember($cacheKey, now()->addHours(24), function() {
            return Course::orderBy('created_at', 'DESC')->get();
        });

        $admin = Help::isAdmin();

        return view('courses.index', [
            'courses' => $courses,
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create', [
            'action' => 'courses.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course;

        $course->title       = $request->title;
        $course->slug        = $request->slug;
        $course->card_image  = $request->card_image;
        $course->cover_image = $request->cover_image;
        $course->excerpt     = $request->excerpt;
        $course->description = $request->description;
        $course->authors     = 'cathzchen';            // temporary fill
        $course->type        = $request->type;
        $course->status      = $request->status;
        $course->save();

        return redirect()->route('courses.show', [
            'id' => $course->id,
            'slug' => $course->slug,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int     $id
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $cacheKey = 'courses.' . $id;

        $course = Cache::remember($cacheKey, now()->addHours(24), function() use($id) {
            return Course::find($id);
        });

        $cacheKey2 = 'courses.' . $id . '.sections';

        $sections = Cache::remember($cacheKey2, now()->addHours(24), function() use($course) {
            return $course->sections()->orderBy('sort', 'ASC')->get();
        });
        
        $admin = Help::isAdmin();

        return view('courses.course', [
            'course' => $course,
            'sections' => $sections,
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
            'action' => 'courses.update',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->title       = $request->title;
        $course->slug        = $request->slug;
        $course->card_image  = $request->card_image;
        $course->cover_image = $request->cover_image;
        $course->excerpt     = $request->excerpt;
        $course->description = $request->description;
        $course->type        = $request->type;
        $course->status      = $request->status;
        $course->save();

        Cache::forget("courses.$course->id");

        return redirect()->route('courses.show', [
            'id' => $course->id,
            'slug' => $course->slug,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
