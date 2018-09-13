@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    <div class="card">
      <div class="card-header">Update Course</div>

      <div class="card-body">

        @include('includes.validation_errors')

        <form action="{{route('courses.update', $course->id)}}" method="post" enctype="" class="form-horizontal">
          {{ csrf_field() }}
          {{ method_field('put')}}

          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Course Name</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="text-input" name="name" value="{{$course->name}}" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="course-input" class=" form-control-label">Course Code</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="course-input" name="code"value="{{$course->code}}" class="form-control">
            </div>
          </div>

          <div class="col-sm-12">
            <input type="submit" value="Update Course" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
