@extends('layouts.admin')
@section('content')

  <div class="col-md-12" style="padding:0">

    <div class="card">
      <div class="card-header">Routine</div>

      <div class="card-body">
        <table class="table table-bordered" style="font-size: 12px">
          <thead>
            <tr style="text-align:center">
              <th>DAY</th>
              <th>SEM</th>
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
              <tr>
                <td rowspan="9" id="day" data-dayid="1" data-dayvalue="SAT">SAT</td>
              </tr>
              @php
              $isLunch = false;
              @endphp
              @foreach (semesters() as $sem)
                <tr>
                  <td><b>S{{$sem}}</b></td>

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
                      <td style="padding:5px">
                        @if ($routines)
                          @foreach ($routines as $r)
                            @if ($sem == $r->semester && $ts->id == $r->time_slot_id)
                              <div class="" style="color:black; ">
                                <p style="color:black;font-size:12px;line-height:0px;margin-top: 5px;">{{$r->course->code}}</p>
                                <p style="color:black;font-size:12px;line-height:0px;">T-{{$r->teacher->sort_name}}, R-{{$r->room->room_no}}</p>
                                {{-- <p style="color:black;font-size:12px;line-height:0px;"></p> --}}
                              </div>
                            @endif
                          @endforeach
                        @endif
                        <p type="button"
                        id="addBtnId{{str_random(20)}}"
                        data-sem="{{$sem}}"
                        data-slot="{{$ts->id}}"
                        data-timeslot="{{$ts->start}}-{{$ts->end}}"
                        style="margin:0px;display:none;padding:1px"
                        class="addBtn btn btn-info btn-sm"
                        data-toggle="modal"
                        data-target="#mediumModal">
                        <i class="fa fa-plus"></i>Add
                      </p>
                    </td>

                  @endif


                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>




      {{-- Add model --}}
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="mediumModalLabel">Add to routine</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="{{route('routine.store')}}" method="post" enctype="" class="form-horizontal">
                {{ csrf_field() }}

                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Day</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <p id="dayInput"></p>
                    <input id="dayInputValue" type="hidden" name="day_id" value="">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Semester</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <p id="semesterInput"></p>
                    <input id="semesterInputValue" type="hidden" name="semester" value="">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Time</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <p id="timeInput"></p>
                    <input id="timeInputValue" type="hidden" name="time_slot_id" value="">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Course</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <select class="form-control" name="course_teacher_id" id="course" required>
                      <option value="">Please Select</option>
                    </select>
                  </div>
                </div>


                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Room</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <select class="form-control" name="room_id" id="room" required>
                      <option value="">Please Select</option>
                      @if ($rooms)
                        @foreach ($rooms as $room)
                          <option value="{{$room->id}}">{{$room->room_no}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class="form-control-label">Note</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input class="form-control" id="note" type="text" name="note">
                  </div>
                </div>

                <div class="col-sm-12">
                  <input type="submit" value="Create" class="btn btn-primary pull-right">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>


      <script>

      $(document).ready(function(){
        $(".addBtn").click(function(){
          var id = this.id;
          // Get data from field
          var sem = $("#"+id).data('sem');
          var slotId = $("#"+id).data('slot');
          var timeSlot = $("#"+id).data('timeslot');

          var dayId = $("#day").data('dayid');
          var dayValue = $("#day").data('dayvalue');

          // Add data to model
          $('#dayInput').text(dayValue);
          $('#semesterInput').text(sem);
          $('#timeInput').text(timeSlot);
          // Hidden input value for db
          $('#dayInputValue').val(dayId);
          $('#semesterInputValue').val(sem);
          $('#timeInputValue').val(slotId);

          // Get assign teacher
          $.ajax({
            url: "{{URL::to('admin/teacher-assign/sem')}}/"+ sem,
            type: 'GET',
            success: function(data){
              $('#course').html("<option value=\"\">Choose</option>");
              $.each(data, function(key, value) {
                $('#course')
                .append($("<option></option>")
                .attr("value",value.course.id +'-'+ value.teacher.id)
                .text(value.course.name +'-'+ value.teacher.name));
              });
            }
          });

        });


        $('td').mouseenter(function () {
          $(this).find('.addBtn').show();
        }).mouseleave(function () {
          $(this).find('.addBtn').hide();
        });


      });


      </script>


    @endsection
