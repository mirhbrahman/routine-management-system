<?php

namespace App\Http\Controllers\Teacher\Routine;

use Auth;
use App\User;
use App\Models\Routine;
use App\Models\TimeSlot;
use App\Http\Controllers\Controller;
use App\Models\Session as ClassSession;

class RoutineController extends Controller
{
    public function index()
    {
      $routines = Routine::where('teacher_id', Auth::user()->id)->get();
      return view('teacher.routine.index')
        ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
        ->with('session', ClassSession::first())
        ->with('routines', $routines)
        ->with('teacher', User::where('id', Auth::user()->id)->where('is_teacher', 1)->where('is_active', 1)->first());
    }
}
