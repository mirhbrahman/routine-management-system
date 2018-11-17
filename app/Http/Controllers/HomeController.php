<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Room;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')
        ->with('users', User::count())
        ->with('teachers', User::where('is_teacher', 1)->count())
        ->with('courses', Course::count())
        ->with('rooms', Room::count());
    }
}
