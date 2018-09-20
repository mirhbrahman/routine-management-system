<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="{{asset('admin/css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/cs-skin-elastic.css')}}">
  <!-- <link rel="stylesheet" href="admin/css/bootstrap-select.less')}}"> -->
  <link rel="stylesheet" href="{{asset('admin/scss/style.css')}}">
  <link href="{{asset('admin/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('admin/css/lib/datatable/dataTables.bootstrap.min.css')}}">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> @yield('styles')
  <link rel="stylesheet" type="text/css" id="theme" href="{{asset('css/toastr.min.css')}}" />
  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

  <script src="{{asset('admin/js/vendor/jquery-2.1.4.min.js')}}"></script>
</head>

<body>


  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    @include('partials.admin.navbar')
  </aside>
  <!-- /#left-panel -->

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

      <div class="header-menu">

        <div class="col-sm-7">
          <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
          <div class="header-left">
            <div class="dropdown for-notification">
            </div>
          </div>
        </div>

        <div class="col-sm-5">
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="user-avatar rounded-circle" src="{{asset('imgs/setting.png')}}" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="{{route('user.profile.edit')}}"><i class="fa fa- user"></i>My Profile</a>
              <hr>
              <form  id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
              </form>

            </div>
          </div>

        </div>
      </div>

    </header>
    <!-- /header -->
    <!-- Header-->

    {{--
    <div class="breadcrumbs">
    <div class="col-sm-4">
    <div class="page-header float-left">
    <div class="page-title">
    <h1>Dashboard</h1>
  </div>
</div>
</div>
<div class="col-sm-8">
<div class="page-header float-right">
<div class="page-title">
<ol class="breadcrumb text-right">
<li class="active">Dashboard</li>
</ol>
</div>
</div>
</div>
</div> --}}

<div class="content">

  @yield('content')

</div>
<!-- .content -->
</div>
<!-- /#right-panel -->

<!-- Right Panel -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{asset('admin/js/plugins.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>


{{--
<script src="{{asset('admin/js/lib/chart-js/Chart.bundle.js')}}"></script> --}}
<script src="{{asset('admin/js/dashboard.js')}}"></script>
{{--
<script src="{{asset('admin/js/widgets.js')}}"></script> --}}
<script src="{{asset('admin/js/lib/vector-map/jquery.vmap.js')}}"></script>
<script src="{{asset('admin/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('admin/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>



<script src="{{asset('admin/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/datatables-init.js')}}"></script>


<script type="text/javascript">
$(document).ready(function() {
  $('#bootstrap-data-table-export').DataTable();
} );
</script>

<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
<script type="text/javascript">
@if (Session::has('success'))
toastr.success("{{Session::get('success')}}")
@endif
@if (Session::has('info'))
toastr.info("{{Session::get('info')}}")
@endif
</script>

@yield('scripts')

</body>

</html>
