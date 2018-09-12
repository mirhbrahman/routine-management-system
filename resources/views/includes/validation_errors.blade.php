@if ($errors->all())
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    @foreach ($errors->all() as $e)
    <li>{{$e}}</li>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif