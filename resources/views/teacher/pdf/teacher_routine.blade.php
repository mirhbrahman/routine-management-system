@extends('layouts.pdf')
@section('content')
  <style media="screen">
  .table-bordered td, .table-bordered th{
    border: 1px solid black;
  }
  table {
    border-collapse: collapse;
  }
</style>
  <div class="col-md-12" style="padding:0">

    <div class="card">
    <div class="card-body">
      <h4 style="text-align:center;">Department of Computer Science & Engineering</h4>
      <p style="text-align:center;font-weight:bold">
        Class Routine –
        @if ($session->session)
          {{$session->session}}
        @else
          <p>(No session)</p>
        @endif
      </p>
      

        <p style="color:black; ">Teacher: {{$teacher->name}}</p>
        <table class="table table-bordered" style="font-size: 12px;color:black">
          <thead>
            <tr style="text-align:center">
              <th style="border-bottom:1px solid black;">DAY</th>
              @if ($timeslots)
                @foreach ($timeslots as $ts)
                  <th style="border-bottom:1px solid black;">
                    {{$ts->start}}<br>
                    -<br>
                    {{$ts->end}}</th>
                  @endforeach
                @endif
              </tr>
            </thead>
            <tbody>
              @php
              $isLunch = false;
              @endphp
              @foreach (days() as $day_id => $day)
                <tr>
                  <td><b>{{$day}}</b></td>

                  @foreach ($timeslots as $ts)

                    @if ($ts->lunch)
                      @php
                      $isLunch = true;
                      @endphp

                      @if ($isLunch && $day_id==4)
                        <td style="background:silver;text-align:center"><b>Lunch</b></td>
                      @else
                        <td style="background:silver;text-align:center"></td>
                      @endif
                    @else
                      <td style="padding:5px;">
                        @if ($routines)
                          @foreach ($routines as $r)
                            @if ($day_id == $r->day_id && $ts->id == $r->time_slot_id)
                              <div class="" style="color:black; ">
                                <p style="color:black;font-size:12px;margin-bottom:0">S{{$r->semester}}: {{$r->course->code}}</p>
                                <p style="color:black;font-size:12px;margin-bottom:0">T-{{$r->teacher->short_name}}, R-{{$r->room->room_no}}</p>
                                <p style="color:black;font-size:12px;margin-bottom:0">@if ($r->note)
                                  ( {{$r->note}} )
                                @endif</p>
                              </div>
                            @endif
                          @endforeach
                        @endif

                      </td>

                    @endif

                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>

      @endsection
