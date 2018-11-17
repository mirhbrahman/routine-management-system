@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif 

                    <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  Welcome {{Auth::user()->name}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>


           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                            @if($users)
                            {{$users}}
                            @endif
                        </span>
                        </h4>
                        <p class="text-light"> <i class="fa fa-user"></i> Users</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-5">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                            @if($teachers)
                            {{$teachers}}
                            @endif
                        </span>
                        </h4>
                        <p class="text-light"> <i class="fa fa-graduation-cap"></i> Teachers</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                            @if($courses)
                            {{$courses}}
                            @endif
                        </span>
                        </h4>
                        <p class="text-light"> <i class="fa fa-book"></i> Courses</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                            @if($rooms)
                            {{$rooms}}
                            @endif
                        </span>
                        </h4>
                        <p class="text-light"> <i class="fa fa-home"></i> Rooms</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            

          

        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
