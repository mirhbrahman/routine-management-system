<nav class="navbar navbar-expand-sm navbar-default">

  <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
    aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
  </button>
  <a class="navbar-brand" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a>
  <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a>
</div>

<div id="main-menu" class="main-menu collapse navbar-collapse">
  <ul class="nav navbar-nav">
    <li class="active">
      <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
    </li>
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
      <a href="{{ route('teacher-assigns.index') }}"> <i class="menu-icon fa fa fa-address-book"></i>Teacher Assign </a>
    </li>
    <li class="">
      <a href="{{ route('routine.index') }}"> <i class="menu-icon fa fa fa-calendar"></i>Make Routine </a>
    </li>

  <li class="">
    <a href="{{ route('teacher.routine.index') }}"> <i class="menu-icon fa fa fa-calendar"></i>Your Routine </a>
  </li>



  </ul>
</div>
<!-- /.navbar-collapse -->
</nav>
