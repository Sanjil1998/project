@extends('layouts.layout')

@section('content')


        <div class="container content-lg">
            <!-- gallery row starts -->

            <div class="row">
                <div class="text-center sm-text-left">
                    <h2><i class="fa fa-picture-o"></i> Gallery</h2>
                    <p>Take a look into my life...</p>
                </div>
                <div class="gallery col-md-12">
                    @foreach($gallery as $galleries)
                    <div class="col-xs-12 col-sm-4 col-md-4 margin-b-6">
                        <a href="{{URL::to('/')}}/public/storage/galleryimages/{{$galleries->image}}" class="big">
                            <img
                            class="full-width img-responsive img-fluid img-thumbnail"
                            src="{{ URL::to('/')}}/public/storage/galleryimages/thumbnail/large_{{$galleries->image }}"
                            alt=""
                            style="height: 250px;max-width: 100%;"
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
