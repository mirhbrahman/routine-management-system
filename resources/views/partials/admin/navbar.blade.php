<nav class="navbar navbar-expand-sm navbar-default">

  <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
    aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
  </button>
  {{-- <a class="navbar-brand" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a>
  <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a> --}}
  <p class="navbar-brand">{{Auth::user()->name}}</p>
</div>

<div id="main-menu" class="main-menu collapse navbar-collapse">
  <ul class="nav navbar-nav">
    <li class="active">
      <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
    </li>
    @if (Auth::user()->is_admin)
      <li class="">
        <a href="{{ route('users.index') }}"> <i class="menu-icon fa fa-user"></i>Users </a>
      </li>
      <li class="">
        <a href="{{ route('courses.index') }}"> <i class="menu-icon fa fa-th"></i>Courses </a>
      </li>
      <li class="">
        <a href="{{ route('timeslots.index') }}"> <i class="menu-icon fa fa-clock-o"></i>Time Slot </a>
      </li>
      <li class="">
        <a href="{{ route('rooms.index') }}"> <i class="menu-icon fa fa-home"></i>Rooms </a>
      </li>
      <li class="">
        <a href="{{ route('session.index') }}"> <i class="menu-icon fa fa-clock-o"></i>Session </a>
      </li>
      <li class="">
        <a href="{{ route('teacher-assigns.index') }}"> <i class="menu-icon fa fa fa-address-book"></i>Teacher Assign </a>
      </li>
      <li class="">
        <a href="{{ route('routine.index') }}"> <i class="menu-icon fa fa fa-calendar"></i>Make Routine </a>
      </li>
      <li class="">
        <a href="{{ route('admin.teacher_routine.index') }}"> <i class="menu-icon fa fa fa-address-book"></i>Teacher Routine </a>
      </li>
    @endif

    @if (Auth::user()->isTeacher())
      <li class="">
        <a href="{{ route('teacher.routine.index') }}"> <i class="menu-icon fa fa fa-calendar"></i>Your Routine </a>
      </li>
    @endif



  </ul>
</div>
<!-- /.navbar-collapse -->
</nav>
