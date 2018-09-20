@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    <div class="card">
      <div class="card-header">Update Users</div>

      <div class="card-body">

        @include('includes.validation_errors')

        <form action="{{route('user.profile.update', $user->id)}}" method="post" enctype="" class="form-horizontal">
          {{ csrf_field() }}
          @method('put')

          <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{$user->name}}" class="form-control"></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sort from of name</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="sort_name" value="{{$user->sort_name}}" class="form-control"></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
            <div class="col-12 col-md-9"><input type="email" id="email-input" name="email"value="{{$user->email}}" class="form-control">

            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
            <div class="col-12 col-md-9"><input type="password" id="password" name="password" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
            <div class="col-12 col-md-9"><input type="password" id="cpassword" name="password_confirmation" class="form-control">
            </div>
          </div>

          <div class="col-sm-12">
            <input type="submit" value="Update Profile" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
