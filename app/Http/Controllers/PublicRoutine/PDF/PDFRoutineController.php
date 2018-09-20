<?php

namespace App\Http\Controllers\PublicRoutine\PDF;

use PDF;
use Auth;
use App\User;
use App\Models\Routine;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session as ClassSession;

class PDFRoutineController extends Controller
{
  public function index(Request $request)
  {
    $sem = $request->get('semester') ? $request->get('semester') : 0;
    $routines = Routine::where('semester', $sem)->get();

    // To preview pdf view uncomment the section
    // return view('public_routine.pdf.public_routine')
    //   ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
    //   ->with('routines', $routines)
    //   ->with('semester', $sem)
    //   ->with('session', ClassSession::first())
    //   ->with('teachers', User::where('is_teacher', 1)->get());


    $session = ClassSession::first();
    $session_for_pdf_name = str_replace(' ', '-', $session->session);

    $data = [
        'routines' => $routines,
        'timeslots' => TimeSlot::orderBy('id', 'ASC')->get(),
        'session' => $session,
        'semester' => $sem,
        'teachers' => User::where('is_teacher', 1)->get()
    ];

    $pdf = PDF::loadView('public_routine.pdf.public_routine', $data);
    $pdf->setPaper('a4', 'landscape');
    return $pdf->download( $session_for_pdf_name. '-sem-'. $sem . '.pdf');
  }
}
