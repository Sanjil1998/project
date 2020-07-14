@extends('layouts.admin.admin-layout')

@section('header')
@include('layouts.admin.header')
@endsection

@section('content')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Contact</h3>
                    <p class="panel-subtitle">Today: {{ date('yy-m-d') }}</p>
                </div>
            </div>
            <!-- END OVERVIEW -->

            <div class="col-md-12">

                @foreach($profile as $profiles)
                    <div class="profile-info">
                        <h4 class="heading">Contact Info</h4>
                        <ul class="list-unstyled list-justify">

                            <li>Name <span class="text-capitalize">{{$profiles->name}}</span></li>
                            <li>Mobile Number<span>{{$profiles->phone}}</span></li>
                            <li>Login Email <span>{{Auth::user()->email}}</span></li>
                            <li>Address <span>{{$profiles->address}}</span></li>
                            <li>Mail Address <span><a href="mailto:{{$profiles->gmail}}">{{$profiles->gmail}}</a></span></li>

                        </ul>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection

@section('footer')
@include('layouts.admin.footer')
@endsection
