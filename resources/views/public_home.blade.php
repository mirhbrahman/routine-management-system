@extends('layouts.app')

@section('content')
  <div class="col-sm-6 offset-sm-3">
    <form action="{{route('public.home')}}" method="get" enctype="" class="form-horizontal">
      <div class="row form-group">
        <div class="col col-md-2">
          <h4 style="margin-top:5px;">Semester</h4>
        </div>
        <div class="col-12 col-md-6">
          <select name="semester" id="semester" class="form-control pull-left">
            <option value="">Please Select</option>
            @foreach (semesters() as $sem)
              <option value="{{$sem}}">S{{$sem}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-4">
          <input type="submit" value="Search" class="btn btn-primary pull-right">
        </div>
      </div>
    </form>
  </div>

  <div class="col-sm-12">
    @if (count($routines))
      <div class="card">
        <div class="card-header">Routine</div>

        <div class="card-body">

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
                                  <p style="color:black;font-size:12px;line-height:0px;">T-{{$r->teacher->sort_name}}, R-{{$r->room->room_no}}</p>
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
          </div>
        @else
          <div class="col-sm-6 offset-sm-3">
            <p style="color:gray">Please search by semester to get your routine.</p>
          </div>
        @endif

      </div>
    @endsection
