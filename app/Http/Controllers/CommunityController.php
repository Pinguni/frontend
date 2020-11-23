<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Show main community page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        return view('community.index', [
            
        ]);
    } 
}
