@if (Session::has('custom_error'))
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="background: #ff5463">
    <p style="color: black">{{Session::get('custom_error')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
