<?php

namespace App\Http\Controllers\Teacher\Routine;

use Auth;
use App\Models\Routine;
use App\Models\TimeSlot;
use App\Http\Controllers\Controller;

class RoutineController extends Controller
{
    public function index()
    {
      $routines = Routine::where('teacher_id', Auth::user()->id)->get();
      return view('teacher.routine.index')
        ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
        ->with('routines', $routines);
    }
}
