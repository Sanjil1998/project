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
                            <h3 class="panel-title">Gallery Overview</h3>
                            <p class="panel-subtitle">Today: {{ date('yy-m-d') }}</p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="gallery col-md-12">
                                    @foreach($gallery as $galleries)
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <a href="{{URL::to('/')}}/storage/app/public/galleryimages/{{$galleries->image}}" class="big">
                                            <img class="full-width img-responsive img-fluid"
                                            src="{{ URL::to('/')}}/storage/app/public/galleryimages/thumbnail/large_{{$galleries->image }}"
                                            alt=""
                                            style="width: 550px; height: 250px;"
                                            title="{{$galleries->image_title}}"/>
                                            <a href="#" class="btn btn-info">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </a>
                                    </div>
                                    @endforeach
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW -->
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
@endsection

@section('footer')
    @include('layouts.admin.footer')
@endsection

@section('scripts')
<script>
    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
</script>
@endsection
