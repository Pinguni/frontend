<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() 
    {
        if (Auth::check())
        {
            $user = User::find(Auth::id());
            $courses = $user->courses()->orderBy('created_at', 'DESC')->get();

            return view('dash.index', [
                'courses' => $courses,
            ]);
        } 
        else 
        {
            return view('home');
        }
    }
}
