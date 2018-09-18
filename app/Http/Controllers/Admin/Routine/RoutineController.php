<?php

namespace App\Http\Controllers\Admin\Routine;

use Session;
use App\Models\Room;
use App\Models\Routine;
use App\Models\TimeSlot;
use App\Models\TeacherAssign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // Default day
      $day_id = $request->get('day_id') ? $request->get('day_id') : 1;

      $routines = Routine::where('day_id', $day_id)->get();
      //return $routines;
        return view('admin.routine.index')
          ->with('timeslots', TimeSlot::orderBy('id', 'ASC')->get())
          ->with('rooms', Room::orderBy('id', 'ASC')->get())
          ->with('routines', $routines)
          ->with('day_id', $day_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course_teacher_id = explode('-', $request->course_teacher_id);
        $routine = new Routine();
        $routine->day_id = $request->day_id;
        $routine->semester = $request->semester;
        $routine->course_id = $course_teacher_id[0];
        $routine->teacher_id = $course_teacher_id[1];
        $routine->room_id = $request->room_id;
        $routine->time_slot_id = $request->time_slot_id;
        $routine->note = $request->note;

        // Check room free
        $room = Routine::where('day_id', $routine->day_id)
          ->where('time_slot_id', $routine->time_slot_id)
          ->where('room_id', $routine->room_id)
          ->first();

        // If room busy
        if ($room) {
          Session::flash('custom_error', 'Room busy or already assign');
          return redirect()->back();
        }

        // Check already assign
        $r = Routine::where('day_id', $routine->day_id)
          ->where('time_slot_id', $routine->time_slot_id)
          ->where('room_id', $routine->room_id)
          ->where('course_id', $routine->course_id)
          ->where('teacher_id', $routine->teacher_id)
          ->first();

        // If already assign
        if ($r) {
          Session::flash('custom_error', 'Already assign');
          return redirect()->back();
        }

        if ($routine->save()) {
          Session::flash('success', 'Added to routine');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    //  return $request->all();
      $r_id = $request->routine_id;
      $routine = Routine::find($r_id);

      if ($routine) {

        if ($request->course_teacher_id) {
          $course_teacher_id = explode('-', $request->course_teacher_id);
          $routine->course_id = $course_teacher_id[0];
          $routine->teacher_id = $course_teacher_id[1];
        }

        if ($request->room_id) {
          $routine->room_id = $request->room_id;
        }
        $routine->note = $request->note;
        // Check room free
        $room = Routine::where('day_id', $routine->day_id)
          ->where('time_slot_id', $routine->time_slot_id)
          ->where('room_id', $routine->room_id)
          ->first();

        // If room busy
        if ($room && $routine->id != $room->id) {
          Session::flash('custom_error', 'Room busy or already assign');
          return redirect()->back();
        }

        // Check already assign
        $r = Routine::where('day_id', $routine->day_id)
          ->where('time_slot_id', $routine->time_slot_id)
          ->where('room_id', $routine->room_id)
          ->where('course_id', $routine->course_id)
          ->where('teacher_id', $routine->teacher_id)
          ->first();

        // If already assign
        if ($r && $routine->id != $room->id) {
          Session::flash('custom_error', 'Already assign');
          return redirect()->back();
        }

        if ($routine->save()) {
          Session::flash('success', 'Routine Updated');
        }
      }


      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine = Routine::find($id);
        if ($routine->delete()) {
          Session::flash('success', 'Routine delete successfull');
        }
        return redirect()->back();
    }
}
