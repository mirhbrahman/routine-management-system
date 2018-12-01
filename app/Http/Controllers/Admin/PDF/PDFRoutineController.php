<?php

namespace App\Http\Controllers\Admin\PDF;

use PDF;
use App\Models\Room;
use App\Models\Routine;
use App\Models\TimeSlot;
use App\Models\TeacherAssign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session as ClassSession;

class PDFRoutineController extends Controller
{
    public function index(Request $request)
    {
      // Default day
      $day_id = $request->get('day_id') ? $request->get('day_id') : 1;

      $routines = Routine::where('day_id', $day_id)->get();
        // To preview pdf view uncomment the section
        // return view('admin.pdf.full_routine')
        //   ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
        //   ->with('rooms', Room::orderBy('id', 'ASC')->get())
        //   ->with('routines', $routines)
        //   ->with('day_id', $day_id)
        //   ->with('session', ClassSession::first())
        //   ->with('teachers', TeacherAssign::groupBy('teacher_id')->get());

      $session = ClassSession::first();
      $day = days($day_id);
      $session_for_pdf_name = str_replace(' ', '-', $session->session);

      $data = [
          'routines' => $routines,
          'timeslots' => TimeSlot::orderBy('id', 'ASC')->get(),
          'rooms' => Room::orderBy('id', 'ASC')->get(),
          'day_id' => $day_id,
          'session' => $session,
          'teachers' => TeacherAssign::groupBy('teacher_id')->get()
      ];

      $pdf = PDF::loadView('admin.pdf.full_routine', $data);
      $pdf->setPaper('a4', 'landscape');
      return $pdf->download( $session_for_pdf_name. '-' . $day . '.pdf');
    }
}
