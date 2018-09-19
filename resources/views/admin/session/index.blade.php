@extends('layouts.admin')
@section('content')
  <div class="col-md-12" style="padding:0">
    <div class="card">
      <div class="card-header">Create Room</div>

      <div class="card-body">

        @include('includes.validation_errors')

        <form action="{{route('session.store')}}" method="post" enctype="" class="form-horizontal">
          {{ csrf_field() }}
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Assign session</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="text-input" name="session" placeholder="Like: April-2018"
              @if ($session)
                value="{{$session->session}}"
              @endif
              class="form-control">
            </div>
          </div>

          <div class="col-sm-12">
            <input type="submit" value="Assign" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
