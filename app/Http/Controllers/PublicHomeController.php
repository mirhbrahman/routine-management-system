<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicHomeController extends Controller
{
    public function index(Request $request)
    {
      $sem = $request->get('semester') ? $request->get('semester') : 0;

      $routines = Routine::where('semester', $sem)->get();
      return view('public_home')
        ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
        ->with('routines', $routines)
        ->with('semester', $sem);
    }
}
