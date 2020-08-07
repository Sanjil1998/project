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
                            <h3 class="panel-title">Dashboard Overview</h3>
                            <p class="panel-subtitle">Today: {{ date('D M,Y') }}</p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-download"></i></span>
                                        <p>
                                            <span class="number">{{$totalimage}}</span>
                                            <span class="title">Images</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                        <p>
                                            <span class="number">{{$totalwork}}</span>
                                            <span class="title">Total Works</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                        <p>
                                            <span class="number">{{$totalexperience}}</span>
                                            <span class="title">Experience</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-eye"></i></span>
                                        <p>
                                            <span class="number">{{$totalskills}}</span>
                                            <span class="title">Skills</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-file"></i></span>
                                        <p>
                                            <span class="number">{{$totaldocument}}</span>
                                            <span class="title">Files</span>
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- END OVERVIEW -->


                    <div class="row">
                        <div class="col-md-7">
                            <!-- TODO LIST -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recent Images</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @foreach($gallery as $galleries)
                                    <div class="col-sm-12 col-xs-12 col-md-4 margin-b-5">
                                        <img src="{{ URL::to('/')}}/public/storage/galleryimages/thumbnail/large_{{$galleries->image }}" alt="" title="{{$galleries->image_title}}" style="width: 160px; height: 150px;">
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- END TODO LIST -->
                        </div>
                        <div class="col-md-5">
                            <!-- TIMELINE -->
                            <div class="panel panel-scrolling">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Skills</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled activity-list">
                                        @foreach($skill as $skills)
                                        <li>
                                            <p>{{$skills->skill_name}}</p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- END TIMELINE -->
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
