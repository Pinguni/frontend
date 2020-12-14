<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
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
    public function store(Request $request, $course)
    {
        $section = new CourseSection;

        $section->course_id = $course;
        $section->title     = $request->title;
        $section->save();

        return redirect()->route('courses.show', [
            'id' => $course,
            'slug' => $request->slug,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function show(CourseSection  $courseSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseSection  $courseSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseSection  $courseSection)
    {
        //
    }

    /**
     * Update the order of specified sections belonging to a course.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        $sections = CourseSection::all();

        foreach ($sections as $section) {
            $section->timestamps = false; // To disable update_at field updation
            $id = $section->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $section->update(['sort' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseSection  $courseSection)
    {
        //
    }
}
