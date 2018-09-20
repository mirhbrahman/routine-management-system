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
<div class="col-sm-12">
  @if (count($routines))
    <div class="card">
      <div class="card-body">
        <h4 style="text-align:center;">Department of Computer Science & Engineering</h4>
        <p style="text-align:center;font-weight:bold;margin-bottom:0">
          Class Routine –
          @if ($session->session)
            {{$session->session}}
          @else
            <p>(No session)</p>
          @endif
        </p>
        <p style="text-align:center;font-weight:bold">
          Semester – {{$semester}}
        </p>
        <table class="table table-bordered" style="font-size: 12px">
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
                                <p style="color:black;font-size:12px;margin-bottom:0">T-{{$r->teacher->sort_name}}, R-{{$r->room->room_no}}</p>
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
          @if ($teachers)
            <div class=""  style="width:100%;">
              <div class="row" style="padding:15px;">
                @foreach ($teachers as $t)
                  <div class=""  style="width:25%;float:left">
                    <p style="margin-bottom:0">{{$t->sort_name}} : {{$t->name}}</p>
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        </div>
      @endif
    </div>
  @endsection
