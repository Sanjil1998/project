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
                            <h3 class="panel-title">Banner Overview</h3>
                            <p class="panel-subtitle">Today: {{ date('D M,Y') }}
                                @if($totalbanner<1)
                                    <a href="{{route('admin.gallery.banner.create')}}" class="btn btn-primary pull-right">Add Image</a>
                                @endif
                            </p>
                        </div>

                    </div>
                    <!-- END OVERVIEW -->
                    <div class="panel-body">
                        <div class="row">
                            @if($totalbanner>0)
                            <div class="gallery col-md-12">
                                @foreach($banner as $banners)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h3>Current Banner</h3>
                                    <a href="{{URL::to('/')}}/public/storage/bannerimages/thumbnail/large_{{$banners->banner_image}}" class="big">
                                        <img class="full-width img-responsive img-fluid"
                                        src="{{ URL::to('/')}}/public/storage/bannerimages/thumbnail/large_{{$banners->banner_image }}"
                                        alt=""
                                        style="width: 80%; height: 50%;"
                                        title="{{$banners->banner_image_title}}"/>
                                    </a>
                                    {!! Form::open(['action' => ['GalleryController@banner_delete', $banners->id], 'method'=>'POST', 'class' => 'pl-0 pr-0' ]) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger pull-right'])}}
                                    {!! Form::close() !!}
                                </div>
                                @endforeach


                                <div class="clear"></div>
                            </div>
                            @else
                            <div class="col-md-12">
                                <p>
                                    No Images. <a href="{{route('admin.gallery.banner.create')}}">Upload Banner Image Here</a>
                                </p>
                            </div>
                            @endif
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

@section('scripts')
<script>
    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
</script>
@endsection
