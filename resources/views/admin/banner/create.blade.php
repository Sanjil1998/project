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
                    <p class="panel-subtitle">Today: {{ date('D, M Y') }}</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- END OVERVIEW -->

            <div class="col-md-12">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Image</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('admin.gallery.banner.store')}}" method="POST" enctype="multipart/form-data" class="md-form">
                                @csrf

                                <div class="form-group">
                                    <label for="banner_image_title">Banner Title</label>
                                    <input type="text" name="banner_image_title" placeholder="Image Title" required="" class="form-control {{ $errors->has('banner_image_title') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('banner_image_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('banner_image_title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="banner_image">Upload Banner Image</label>
                                    <input type="file" name="banner_image" placeholder="Upload Banner Image" required="" class="form-control-file {{ $errors->has('banner_image') ? ' is-invalid' : '' }}" id="imgInp">
                                    @if ($errors->has('banner_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('banner_image') }}</strong>
                                    </span>
                                    @endif
                                    <img id='img-upload'/>
                                </div>

                                <div class="pull-right pt-4">
                                    <button class="btn btn-primary">Add Image</button>
                                    <input type="reset" class=" btn btn-danger">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->


@endsection

@section('scripts')

<script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    });
</script>

@endsection

@section('footer')
@include('layouts.admin.footer')
@endsection
