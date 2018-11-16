<?php

namespace App\Http\Controllers\Teacher\PDF;

use PDF;
use Auth;
use App\User;
use App\Models\Routine;
use App\Models\TimeSlot;
use App\Http\Controllers\Controller;
use App\Models\Session as ClassSession;

class PDFRoutineController extends Controller
{
  public function index($teacher_id = 0)
  {
    // PDF for admin
    if ($teacher_id && Auth::user()->is_admin) {
        $routines = Routine::where('teacher_id', $teacher_id)->get();
        $teacher = User::where('id', $teacher_id)->first();
     
     // PDF for teacher   
    }else{
        $routines = Routine::where('teacher_id', Auth::user()->id)->get();
        $teacher = Auth::user();
    }

    // To preview pdf view uncomment the section
    // return view('teacher.pdf.teacher_routine')
    //   ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
    //   ->with('session', ClassSession::first())
    //   ->with('routines', $routines);


    $session = ClassSession::first();
    $session_for_pdf_name = str_replace(' ', '-', $session->session);
    $teacher_for_pdf_name = str_replace(' ', '-', trim($teacher->name));

    $data = [
        'routines' => $routines,
        'timeslots' => TimeSlot::orderBy('id', 'ASC')->get(),
        'session' => $session,
        'teacher' => $teacher
    ];

    $pdf = PDF::loadView('teacher.pdf.teacher_routine', $data);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->download( $session_for_pdf_name. '-'. $teacher_for_pdf_name . '.pdf');
  }
}
