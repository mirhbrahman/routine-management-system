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
              <li><a href="{{route('users.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add User</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Users</div>

      <div class="card-body">
        @if ($users)
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{$user->name}} ({{$user->sort_name}})</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @if ($user->isActive())
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-warning">Deactive</span>
                    @endif
                    @if ($user->isAdmin())
                      <span class="badge badge-info">Admin</span>
                    @elseif ($user->isTeacher())
                      <span class="badge badge-dark">Teacher</span>
                    @else
                      <span class="badge badge-warning">Reguler</span>
                    @endif

                  </td>
                  <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('users.edit', $user->id)}}"><i class="fa fa-edit"></i>Edit</a>
                    <a class="btn btn-sm btn-outline-danger" href="{{route('users.destroy', $user->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i>Delete</a>
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
