@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1></h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="{{route('teacher-assigns.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Assign Teacher</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Assigned Teacher</div>

      <div class="col-sm-12" style="padding-top:5px;padding-left:20px;">
        <div class="pull-left">
          <label for="">Semesters: </label>
        </div>
        <div class="col-sm-8">
          @foreach (semesters() as $sem)
            <a href="{{ route('teacher-assigns.getBySem', $sem)}}" class="btn btn-sm btn-outline-info">{{$sem}}</a>
          @endforeach
        </div>
      </div>
      <div class="card-body">
        @if ($ats)
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Semester</th>
                <th>Course</th>
                <th>Teacher Name</th>
                <th>Teacher Short Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ats as $at)
                <tr>
                  <td>{{$at->semester}}</td>
                  <td>{{$at->course->name}}</td>
                  <td>{{$at->teacher->name}}</td>
                  <td>{{$at->teacher->short_name}}</td>
                  <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('teacher-assigns.edit', $at->id)}}"><i class="fa fa-edit"></i>Edit</a>
                    <a class="btn btn-sm btn-outline-danger" href="{{route('teacher-assigns.destroy', $at->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i>Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>
  </div>
@endsection
