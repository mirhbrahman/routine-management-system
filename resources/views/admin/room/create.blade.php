@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    <div class="card">
      <div class="card-header">Create Room</div>

      <div class="card-body">

        @include('includes.validation_errors')

        <form action="{{route('rooms.store')}}" method="post" enctype="" class="form-horizontal">
          {{ csrf_field() }}
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Room No</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="text-input" name="room_no" value="{{old('room_no')}}" class="form-control">
            </div>
          </div>

          <div class="col-sm-12">
            <input type="submit" value="Create Room" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
