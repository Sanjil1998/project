@extends('layouts.layout')

@section('content')

        <div class="container content-lg">
            <!-- gallery row starts -->

            <div class="row">
                <h3>Gallery</h3>
                <div class="gallery col-md-12">
                    @foreach($gallery as $galleries)
                    <div class="col-xs-12 col-sm-4 col-md-4 margin-b-5">
                        <a href="{{URL::to('/')}}/storage/app/public/galleryimages/{{$galleries->image}}" class="big">
                            <img
                            class="full-width img-responsive img-fluid"
                            src="{{ URL::to('/')}}/storage/app/public/galleryimages/thumbnail/large_{{$galleries->image }}"
                            alt=""
                            style="width: 550px; height: 250px;"
                            title="{{$galleries->image_title}}"/>
                        </a>
                    </div>
                    @endforeach
                    <div class="clear"></div>
                </div>
            </div>
            <!-- gallery row ends -->
        </div>

@endsection

@section('scripts')
<script>
    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
</script>
@endsection
