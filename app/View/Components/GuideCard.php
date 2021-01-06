<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuideCard extends Component
{
    /**
     * The guide object.
     *
     * @var object
     */
    public $guide;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($guide)
    {
        $this->guide = json_decode($guide);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.guide-card');
    }
}
