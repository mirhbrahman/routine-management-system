<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{-- <link rel="stylesheet" href="{{asset('admin/css/normalize.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/cs-skin-elastic.css')}}"> --}}
    <!-- <link rel="stylesheet" href="admin/css/bootstrap-select.less')}}"> -->
    {{-- <link rel="stylesheet" href="{{asset('admin/scss/style.css')}}">
    <link href="{{asset('admin/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/lib/datatable/dataTables.bootstrap.min.css')}}"> --}}

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> @yield('styles')

</head><body>

    <div id="right-panel" class="right-panel">


        <div class="content">

            @yield('content')

        </div>
        <!-- .content -->
    </div>


</body></html>
