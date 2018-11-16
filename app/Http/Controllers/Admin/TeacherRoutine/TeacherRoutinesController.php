<?php

namespace App\Http\Controllers\Admin\TeacherRoutine;

use App\User;
use App\Models\Routine;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session as ClassSession;

class TeacherRoutinesController extends Controller
{
    public function index()
    {
    	return view('admin.teacherRoutine.index')
            ->with('users', User::where('is_teacher', 1)->where('is_active', 1)->orderBy('name', 'ASC')->get());
    }

    public function show($teacher_id=0)
    {
    	$routines = Routine::where('teacher_id', $teacher_id)->get();
      	return view('admin.teacherRoutine.show')
	        ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
	        ->with('session', ClassSession::first())
	        ->with('routines', $routines)
	        ->with('teacher', User::where('id', $teacher_id)->where('is_teacher', 1)->where('is_active', 1)->first());
    }
}
