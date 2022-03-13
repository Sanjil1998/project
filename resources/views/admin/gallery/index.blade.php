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
                            <p class="panel-subtitle">Today: {{ date('D, M Y') }}
                                <a href="{{route('admin.gallery.create')}}" class="btn btn-primary pull-right">Add Image</a>
                            </p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @if($totalgallery>0)
                                <div class="gallery col-md-12">
                                    @foreach($gallery as $galleries)
                                    <div class="col-xs-12 col-sm-4 col-md-2">
                                        <a href="{{URL::to('/')}}/public/storage/galleryimages/{{$galleries->image}}" class="big">
                                            <img class="full-width img-responsive img-fluid"
                                            src="{{ URL::to('/')}}/public/storage/galleryimages/thumbnail/medium_{{$galleries->image }}"
                                            alt=""
                                            style="width: 300px; height: 185px;"
                                            title="{{$galleries->image_title}}"/>
                                        </a>
                                        {!! Form::open(['action' => ['GalleryController@delete', $galleries->id], 'method'=>'POST', 'class' => 'pl-0 pr-0' ]) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger pull-right', 'onclick' => 'return confirm("Confirm to delete.");'])}}
                                        {!! Form::close() !!}
                                    </div>
                                    @endforeach


                                    <div class="clear"></div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <p>
                                        No Images. <a href="{{route('admin.gallery.create')}}">Upload Image Here</a>
                                    </p>
                                </div>
                                @endif
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
