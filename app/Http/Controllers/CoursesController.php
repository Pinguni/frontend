<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CoursesController extends Controller
{
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

    /**
     * Show edit content page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, $type, $action)
    {
        $course = Course::find($id);

        return view('courses.edit', [
            'course' => $course,
            'id' => $id,
            'type' => $type,
        ]);
    }
}
