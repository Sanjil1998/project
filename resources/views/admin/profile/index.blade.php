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
                        <div class="panel">
                            <div class="row">
                                <!-- LEFT COLUMN -->
                                <div class="col-md-5">

                                    <!-- PROFILE HEADER -->
                                    <div class="profile-header">
                                        <div class="overlay"></div>
                                        <div class="profile-main">
                                            @foreach($profile as $profiles)
                                            <img src="{{URL::to('/')}}/public/storage/images/{{$profiles->image}}" class="img-circle" alt="Avatar" width="150" height="150">
                                            @endforeach
                                            <h3 class="name text-capitalize">{{Auth::user()->name}}</h3>
                                        </div>
                                    </div>
                                    <!-- END PROFILE HEADER -->

                                    <!-- PROFILE DETAIL -->
                                    <div class="profile-detail">
                                        @foreach($profile as $profiles)
                                        <div class="profile-info">
                                            <h4 class="heading">Basic Info</h4>
                                            <ul class="list-unstyled list-justify">

                                                <li>Name <span class="text-capitalize">{{$profiles->name}}</span></li>
                                                <li>Birth Date <span>{{$profiles->dob}}</span></li>
                                                <li>Mobile Number<span>{{$profiles->phone}}</span></li>
                                                <li>Login Email <span>{{Auth::user()->email}}</span></li>
                                                <li>Address <span>{{$profiles->address}}</span></li>
                                                <li>Mail Address <span><a href="mailto:{{$profiles->gmail}}">{{$profiles->gmail}}</a></span></li>

                                            </ul>
                                        </div>
                                        <div class="profile-info">
                                            <h4 class="heading">Social</h4>
                                            <ul class="list-inline social-icons">
                                                <li><a href="{{$profiles->facebook}}" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="{{$profiles->twitter}}" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="{{$profiles->instagram}}" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="{{$profiles->linkedin}}" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{route('admin.profile.update_profile', [$profiles->id])}}" class="btn btn-warning">Edit Profile</a>
                                            <a href="{{ route('changepassword.index') }}" class="btn btn-danger">Change Password</a>
                                        </div>
                                        @endforeach

                                        @if(count($profile) > 1)
                                        <div class="text-center">
                                            <a href="{{route('admin.profile.create_profile')}}" class="btn btn-primary">Add Profile</a>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- END PROFILE DETAIL -->
                                </div>
                                <!-- END LEFT COLUMN -->

                                <!-- RIGHT COLUMN -->
                                <div class="col-md-7">
                                    <!-- TABBED CONTENT -->
                                    <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                        <ul class="nav" role="tablist">
                                            <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Skills</a></li>
                                            <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Works <span class="badge">{{$totalwork}}</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-bottom-left1">
                                            <!-- show blogs -->
                                            <ul class="list-unstyled activity-timeline">
                                                @foreach($skill as $skills)
                                                <li>
                                                    <i class="fa fa-bookmark activity-icon"></i>
                                                    <p>{{$skills->skill_name}}</p>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="margin-top-30 text-center"><a href="{{route('admin.profile.about')}}" class="btn btn-default">See all activity</a></div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-bottom-left2">
                                            <!-- show work experiences -->
                                            <ul class="list-unstyled activity-timeline">
                                                @foreach($work as $works)
                                                <li>
                                                    <i class="fa fa-bookmark activity-icon"></i>
                                                    <p>{{$works->work_title}}</p>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="margin-top-30 text-center"><a href="{{route('admin.profile.work')}}" class="btn btn-default">See all activity</a></div>

                                        </div>
                                    </div>
                                    <!-- END TABBED CONTENT -->
                                </div>
                                <!-- END RIGHT COLUMN -->
                                <div class="clearfix"></div>
                            </div>
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
