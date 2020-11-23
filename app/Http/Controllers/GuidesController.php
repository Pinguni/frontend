<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidesController extends Controller
{
    /**
     * Show all guides.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guides.index', [
            
        ]);
    }
}
