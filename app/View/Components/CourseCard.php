<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CourseCard extends Component
{
    /**
     * The course object.
     *
     * @var object
     */
    public $course;

    /**
     * Create a new component instance.
     *
     * @param  object  $course
     * @return void
     */
    public function __construct($course)
    {
        $this->course = json_decode($course);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.course-card');
    }
}
