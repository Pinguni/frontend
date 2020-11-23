<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CoursesController extends Controller
{
    /**
     * Show all courses.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();

        return view('courses.index', [
            'courses' => $courses,
        ]);
    }

    /**
     * Show specific course page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function course($id, $permalink)
    {
        $course = Course::find($id);

        return view('courses.course', [
            'course' => $course,
        ]);
    }
}
