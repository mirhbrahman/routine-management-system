@extends('layouts.admin')
@section('content')

  <div class="col-md-12" style="padding:0">


    <div class="breadcrumbs">
      <div class="col-sm-12" style="padding:0">
        <div class="page-header float-left" style="padding-top:10px;">
          <div class="page-title">
            @foreach (days() as $day => $value)
              <a
              @if ($day == $day_id)
                class="btn btn-sm btn-info"
              @else
                class="btn btn-sm btn-outline-info"
              @endif
              href="{{ route('routine.index', ['day_id' => $day])}}">{{$value}}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Routine</div>

      <div class="card-body">
        <h4 style="text-align:center;margin-bottom:15px">DEPARTMENT OF CSE, Class Routine, Session
          @if ($session->session)
            {{$session->session}}
          @else
            <p style="color:red">(Please add session)</p>
          @endif
        </h4>
        @include('includes.custom_errors')

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
                <td rowspan="9" id="day" data-dayid="{{$day_id}}" data-dayvalue="{{days($day_id)}}">{{days($day_id)}}</td>
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
                      <td style="padding:5px;">
                        @if ($routines)
                          @foreach ($routines as $r)
                            @if ($sem == $r->semester && $ts->id == $r->time_slot_id)
                              <div class="" style="color:black; ">
                                <p style="color:black;font-size:12px;line-height:0px;margin-top: 5px;">{{$r->course->code}}</p>
                                <p style="color:black;font-size:12px;line-height:0px;">T-{{$r->teacher->short_name}}, R-{{$r->room->room_no}}</p>
                                <p style="color:black;font-size:12px;line-height:0px;">@if ($r->note)
                                  ( {{$r->note}} )
                                @endif</p>

                                {{-- <p style="color:black;font-size:12px;line-height:0px;"></p> --}}

                                <div style="text-align:center; margin-bottom:10px;">
                                  <p type="button"
                                  id="editBtnId{{str_random(20)}}"
                                  data-sem="{{$sem}}"
                                  data-slot="{{$ts->id}}"
                                  data-timeslot="{{$ts->start}}-{{$ts->end}}"
                                  data-course="{{$r->course->name}}-{{$r->course->code}} ({{$r->teacher->name}})"
                                  {{-- data-teacher="{{$r->teacher->name}}" --}}
                                  data-room_no="{{$r->room->room_no}}"
                                  data-note="{{$r->note}}"
                                  data-routine_id="{{$r->id}}"
                                  style="margin:0px;display:none;padding:0px"
                                  class="editBtn btn btn-primary btn-sm"
                                  data-toggle="modal"
                                  data-target="#editModel">
                                  <i class="fa fa-edit"></i>Edit
                                </p>

                                <a
                                class="deleteBtn btn btn-danger btn-sm"
                                style="margin:0px;display:none;padding:0px"
                                href="{{route('routine.destroy', $r->id)}}"
                                onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fa fa-trash"></i>Delete</a>


                              </div>
                            </div>
                          @endif
                        @endforeach
                      @endif
                      <div style="text-align:center">
                        <p type="button"
                        id="addBtnId{{str_random(20)}}"
                        data-sem="{{$sem}}"
                        data-slot="{{$ts->id}}"
                        data-timeslot="{{$ts->start}}-{{$ts->end}}"
                        style="margin:0px;display:none;padding:0px"
                        class="addBtn btn btn-info btn-sm"
                        data-toggle="modal"
                        data-target="#addModel">
                        <i class="fa fa-plus"></i>Add
                      </p>
                    </div>
                  </td>

                @endif


              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>

      <a href="{{route('pdf.full_routine.index', ['day_id' => $day_id])}}" class="btn btn-sm btn-info pull-right">Download</a>
    </div>




    {{-- Add model --}}
    <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModelLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModelLabel">Add to routine</h5>
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
                    <option value="">Please select</option>
                  </select>
                </div>
              </div>


              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Room</label>
                </div>
                <div class="col-12 col-md-9">
                  <select class="form-control" name="room_id" id="room" required>
                    <option value="">Please select</option>
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

    {{-- End add model --}}


    {{-- Edit model --}}
    <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="editModelLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModelLabel">Edit routine</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form action="{{route('routine.update')}}" method="post" enctype="" class="form-horizontal">
              {{ csrf_field() }}

              <input type="hidden" id="editRoutineIdValue" name="routine_id" value="">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Day</label>
                </div>
                <div class="col-12 col-md-9">
                  <p id="editDayInput"></p>
                  <input id="editDayInputValue" type="hidden" name="day_id" value="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Semester</label>
                </div>
                <div class="col-12 col-md-9">
                  <p id="editSemesterInput"></p>
                  <input id="editSemesterInputValue" type="hidden" name="semester" value="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Time</label>
                </div>
                <div class="col-12 col-md-9">
                  <p id="editTimeInput"></p>
                  <input id="editTimeInputValue" type="hidden" name="time_slot_id" value="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Course</label>
                </div>
                <div class="col-12 col-md-9">
                  <p id="editCourseInput"></p>
                  <select class="form-control" name="course_teacher_id" id="editCourse" >
                    <option value="">Please select</option>
                  </select>
                </div>
              </div>


              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Room</label>
                </div>
                <div class="col-12 col-md-9">
                  <p id="editRoomNoInput"></p>
                  <select class="form-control" name="room_id" id="editRoom" >
                    <option value="">Please select for edit</option>
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
                  <input class="form-control" id="editNoteInputValue" type="text" name="note">
                </div>
              </div>

              <div class="col-sm-12">
                <input type="submit" value="Update" class="btn btn-primary pull-right">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    {{-- End edit model --}}













    <script>

    $(document).ready(function(){
      // Add click
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
            $('#course').html("<option value=\"\">Please select</option>");
            $.each(data, function(key, value) {
              $('#course')
              .append($("<option></option>")
              .attr("value",value.course.id +'-'+ value.teacher.id)
              .text(value.course.name +'-'+ value.teacher.name));
            });
          }
        });

      });


      // Edit click
      $(".editBtn").click(function(){
        var id = this.id;
        // Get data from field
        var sem = $("#"+id).data('sem');
        var slotId = $("#"+id).data('slot');
        var timeSlot = $("#"+id).data('timeslot');

        var dayId = $("#day").data('dayid');
        var dayValue = $("#day").data('dayvalue');

        // Edit data
        var course = $("#"+id).data('course');
        // var teacher = $("#"+id).data('teacher');
        var roomNo = $("#"+id).data('room_no');
        var editNote = $("#"+id).data('note');
        var routineId = $("#"+id).data('routine_id');


        // Add data to model
        $('#editDayInput').text(dayValue);
        $('#editSemesterInput').text(sem);
        $('#editTimeInput').text(timeSlot);
        $('#editCourseInput').text(course);
        // $('#editTeacherInput').text(teacher);
        $('#editRoomNoInput').text(roomNo);

        // Hidden input value for db
        $('#editDayInputValue').val(dayId);
        $('#editSemesterInputValue').val(sem);
        $('#editTimeInputValue').val(slotId);

        // Assign ID
        $('#editRoutineIdValue').val(routineId);
        $('#editNoteInputValue').val(editNote);

        // Get assign teacher
        $.ajax({
          url: "{{URL::to('admin/teacher-assign/sem')}}/"+ sem,
          type: 'GET',
          success: function(data){
            $('#editCourse').html("<option value=\"\">Please select for edit</option>");
            $.each(data, function(key, value) {
              $('#editCourse')
              .append($("<option></option>")
              .attr("value",value.course.id +'-'+ value.teacher.id)
              .text(value.course.name +'-'+ value.teacher.name));
            });
          }
        });

      });




      // Add button
      $('td').mouseenter(function () {
        $(this).find('.addBtn').show();
      }).mouseleave(function () {
        $(this).find('.addBtn').hide();
      });

      // Edit button
      $('td').mouseenter(function () {
        $(this).find('.editBtn').show();
      }).mouseleave(function () {
        $(this).find('.editBtn').hide();
      });

      // Delete button
      $('td').mouseenter(function () {
        $(this).find('.deleteBtn').show();
      }).mouseleave(function () {
        $(this).find('.deleteBtn').hide();
      });


    });


    </script>


  @endsection
