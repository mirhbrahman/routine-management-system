@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{asset('admin/css/timepicki.css')}}">
  <script type="text/javascript" src="{{asset('admin/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/js/timepicki.js')}}"></script>


  <div class="col-md-12" style="padding:0">
    <div class="card">
      <div class="card-header">Update Time Slot</div>

      <div class="card-body">

        @include('includes.validation_errors')

        <form action="{{route('timeslots.update', $timeslot->id)}}" method="post" enctype="" class="form-horizontal">
          {{ csrf_field() }}
          {{ method_field('put')}}

          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Start</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="start" name="start" value="{{ $timeslot->start }}" class="form-control">
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
              <label for="end-input" class=" form-control-label">End</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="end" name="end" value="{{ $timeslot->end }}" class="form-control">
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Lunch</label></div>
            <div class="col col-md-9">
              <div class="form-check-inline form-check">
                <label for="checkbox1" class="form-check-label ">
                  <input type="checkbox" id="lunch" name="lunch" value="1" class="form-check-input" @if ($timeslot->lunch)
                    checked
                  @endif>
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-12">
            <input type="submit" value="Update Time Slot" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript">
  $("#start").timepicki();
  $("#end").timepicki();

</script>
@endsection
