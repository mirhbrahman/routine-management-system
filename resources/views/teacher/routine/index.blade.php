@extends('layouts.admin')
@section('content')

  <div class="col-md-12" style="padding:0">

    <div class="card">
      <div class="card-header">Routine</div>

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
        
        <p style="color:black; ">Teacher: 
        @if($teacher)
          {{$teacher->name}}
        @endif
      </p>
        @include('includes.custom_errors')

        <table class="table table-bordered" style="font-size: 12px">
          <thead>
            <tr style="text-align:center">
              <th>DAY</th>
              @if ($timeslots)
                @foreach ($timeslots as $ts)
                  <th>
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
                                <p style="color:black;font-size:12px;line-height:0px;margin-top: 5px;">S{{$r->semester}}: {{$r->course->code}}</p>
                                <p style="color:black;font-size:12px;line-height:0px;">T-{{$r->teacher->short_name}}, R-{{$r->room->room_no}}</p>
                                <p style="color:black;font-size:12px;line-height:0px;">@if ($r->note)
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
            <a href="{{route('pdf.teacher_routine.index', Auth::user()->id)}}" class="btn btn-sm btn-info pull-right">Download</a>
        </div>

      @endsection
