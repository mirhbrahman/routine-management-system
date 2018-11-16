@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    <div class="card">
      <div class="card-header">Create User</div>

      <div class="card-body">

        @include('includes.validation_errors')

        <form action="{{route('users.store')}}" method="post" enctype="" class="form-horizontal">
          {{ csrf_field() }}
          <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{old('name')}}" class="form-control"></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Short from of name</label></div>
            <div class="col-12 col-md-9">
              <input type="text" id="text-input" name="short_name" value="{{old('short_name')}}" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
            <div class="col-12 col-md-9"><input type="email" id="email-input" name="email"value="{{old('email')}}" class="form-control">

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

          <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Is Teacher</label></div>
            <div class="col col-md-9">
              <div class="form-check-inline form-check">
                <label for="checkbox1" class="form-check-label ">
                  <input type="checkbox" id="is_teacher" name="is_teacher" value="1" class="form-check-input">
                </label>
              </div>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Is Active</label></div>
            <div class="col col-md-9">
              <div class="form-check-inline form-check">
                <label for="checkbox1" class="form-check-label ">
                  <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input">
                </label>
              </div>
            </div>
          </div>


          <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Is Admin</label></div>
            <div class="col col-md-9">
              <div class="form-check-inline form-check">
                <label for="checkbox1" class="form-check-label ">
                  <input type="checkbox" id="is_admin" name="is_admin" value="1" class="form-check-input">
                </label>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <input type="submit" value="Create User" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
