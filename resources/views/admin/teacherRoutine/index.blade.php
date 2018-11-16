@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    
    <div class="card">
      <div class="card-header">Teachers</div>

      <div class="card-body">
        @if ($users)
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Short Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->short_name}}</td>
                  <td>{{$user->email}}</td>
                  
                  <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('admin.teacher_routine.show', $user->id)}}"><i class="fa fa-eye"></i> View Routine</a>
                    
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
