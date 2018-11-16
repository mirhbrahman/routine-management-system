@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    <div class="card">
      <div class="card-header">Assign Teacher</div>

      <div class="card-body">

        @include('includes.validation_errors')
        <form action="{{route('teacher-assigns.store')}}" method="post" enctype="" class="form-horizontal">
          {{ csrf_field() }}

          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Semester</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="semester" id="semester" class="form-control">
                <option value="">Please Select</option>
                @foreach (semesters() as $sem)
                  <option value="{{$sem}}">{{$sem}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Course</label>
            </div>
            <div class="col-12 col-md-9">
              <select class="form-control" name="course">
                <option value="">Please select</option>
                @if ($courses)
                  @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}-{{$course->code}}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Teacher</label>
            </div>
            <div class="col-12 col-md-9">
              <select class="form-control" name="teacher">
                <option value="">Please select</option>
                @if ($teachers)
                  @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}-{{$teacher->short_name}}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>

          <div class="col-sm-12">
            <input type="submit" value="Assign Teacher" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
