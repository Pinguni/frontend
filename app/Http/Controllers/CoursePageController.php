<?php

namespace App\Http\Controllers;

use Help;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CoursePage;
use Illuminate\Http\Request;

class CoursePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course, $section)
    {
        $page = new CoursePage;

        $page->course_section_id = $section;
        $page->title             = $request->title;
        $page->save();

        return redirect()->route('courses.show', [
            'id' => $course,
            'slug' => $request->slug,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoursePage  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, CourseSection $section, CoursePage $page)
    {
        $admin = Help::isAdmin();
        $sections = $course->sections;

        return view('courses.page', [
            'admin' => $admin,
            'course' => $course,
            'section' => $section,
            'sections' => $sections,
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoursePage  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id, $section_id, CoursePage $page)
    {
        return view('courses.pages.edit', [
            'course_id' => $course_id,
            'section_id' => $section_id,
            'page' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoursePage  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course, $section, CoursePage $page)
    {
        $page->title       = $request->title;
        $page->slug        = $request->slug;
        $page->content     = $request->content;
        $page->status      = $request->status;
        $page->save();

        return redirect()->route('courses.sections.pages.show', [
            'course' => Course::find($course),
            'section' => CourseSection::find($section),
            'page' => $page,
        ]);
    }

    /**
     * Update the order of specified pages belonging to a course section.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        $pages = CoursePage::all();

        foreach ($pages as $page) {
            $page->timestamps = false; // To disable update_at field updation
            $id = $page->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $page->update(['sort' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoursePage  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoursePage $page)
    {
        //
    }
}
