<?php

namespace App\Http\Controllers;

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
        $courses = Course::all();

        return view('courses.index', [
            'courses' => $courses,
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
            'permalink' => $course->slug,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
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

        return redirect()->route('courses.show', [
            'id' => $course->id,
            'permalink' => $course->slug,
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
