<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Routine;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session as ClassSession;

class PublicHomeController extends Controller
{
    public function index(Request $request)
    {
      $sem = $request->get('semester') ? $request->get('semester') : 0;

      $routines = Routine::where('semester', $sem)->get();
      return view('public_home')
        ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
        ->with('routines', $routines)
        ->with('semester', $sem)
        ->with('session', ClassSession::first())
        ->with('teachers', User::where('is_teacher', 1)->get());
    }
}
