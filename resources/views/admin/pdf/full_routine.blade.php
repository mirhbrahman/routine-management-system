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
    <div class="card-body" id="content">
      <h4 style="text-align:center;">Department of Computer Science & Engineering</h4>
      <p style="text-align:center;font-weight:bold">
        Class Routine –
        @if ($session->session)
          {{$session->session}}
        @else
          <p>(No session)</p>
        @endif
      </p>
      <table class="table table-bordered" style="font-size: 12px;color:black">
        <thead style="text-align:center">
          <th style="border-bottom:1px solid black;">DAY</th>
          <th style="border-bottom:1px solid black;">SEM</th>
          @if ($timeslots)
              @foreach ($timeslots as $ts)
                <th style="border-bottom:1px solid black;">{{$ts->start}}<br>-<br>{{$ts->end}}</th>
                @endforeach
              @endif
        </thead>
        <tbody>
          @php$isLunch = false;@endphp
          <tr>
              <td style="padding:0px;padding-top: -3px;overflow:hidden;text-align:center" rowspan="9">{{days($day_id)}}</td>
          </tr>
          @foreach (semesters() as $sem)
            <tr><td><b>S{{$sem}}</b></td>
              @foreach ($timeslots as $ts)
                @if ($ts->lunch)
                  @php
                  $isLunch = true;
                  @endphp
                  @if ($isLunch && $sem==4)
                    <td style="background:silver;text-align:center"><b>Lunch</b></td>
                  @else
                    <td style="background:silver;text-align:center"></td>
                  @endif
                @else
                  <td style="padding:3px">
                    @if ($routines)
                      @foreach ($routines as $r)
                        @if ($sem == $r->semester && $ts->id == $r->time_slot_id)
                          <div class="" style="color:black;">
                            <p style="color:black;font-size:12px;margin-bottom:0">{{$r->course->code}}</p>
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

      <table class="table">
                    @php
                    $teachers;
                    @endphp
                    <tbody>
                     @while (count($teachers))
                     @php
                     $index = count($teachers)-1;
                     @endphp
                     <tr>
                      <td style="border: none;padding:5px;">{{$teachers[$index]->teacher->short_name}} : {{$teachers[$index]->teacher->name}}</td>


                      @if (isset($teachers[$index-1]))
                      <td style="border: none;padding:5px;">{{$teachers[$index-1]->teacher->short_name}} : {{$teachers[$index-1]->teacher->name}}</td>

                      @endif

                      @php
                      unset($teachers[$index]);
                      unset($teachers[$index-1]);
                      @endphp
                      
                    </tr>
                    @endwhile
                    
                  </tbody>
                </table>

    </div>
  @endsection
