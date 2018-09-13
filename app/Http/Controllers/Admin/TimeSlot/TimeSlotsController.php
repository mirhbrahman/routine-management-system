<?php

namespace App\Http\Controllers\Admin\TimeSlot;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeSlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.timeslot.index')
        ->with('timeslots', TimeSlot::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.timeslot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'start' => 'required|unique:time_slots',
          'end' => 'required',
        ]);

        $ts = new TimeSlot();
        $ts->start = $request->start;
        $ts->end = $request->end;
        $ts->lunch = $request->lunch ? 1 : 0;

        if ($ts->save()) {
            $request->session()->flash('success', 'Time Slot create successful');
        }
        return redirect()->route('timeslots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSlot $timeslot)
    {
        return view('admin.timeslot.edit')
          ->with('timeslot', $timeslot);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSlot $timeslot)
    {
        $this->validate($request, [
          'start' => 'required|unique:time_slots,start,' . $timeslot->id,
          'end' => 'required',
        ]);

        $timeslot->start = $request->start;
        $timeslot->end = $request->end;
        $timeslot->lunch = $request->lunch ? 1 : 0;

        if ($timeslot->save()) {
            $request->session()->flash('success', 'Time Slot update successful');
        }
        return redirect()->route('timeslots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TimeSlot $timeslot)
    {
        $timeslot->delete();
        $request->session()->flash('success', 'Time Slot delete successfull');
        return redirect()->route('timeslots.index');
    }
}
