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
                    <h3 class="panel-title">Overview</h3>
                    <p class="panel-subtitle">Today: {{ date('D, M Y') }}</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-pencil"></i></span>
                                <p>
                                    <span class="number">{{$totalBlog}}</span>
                                    <span class="title">Your Writings</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-bookmark"></i></span>
                                <p>
                                    <span class="number">{{$unpublishedBlog}}</span>
                                    <span class="title">Unpublished Blogs</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">{{$publishedBlog}}</span>
                                    <span class="title">Published Blogs</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->

            <!-- BLOG SECTION -->

            <div class="panel">
                <div class="panel-body">
                    <div class="row">

                        {!! Form::open(['class' => '', 'enctype' => 'multipart/form-data', 'action' => ['BlogController@update', $blog->id], 'method' => 'POST']) !!}
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="blog_title">Title</label>
                            <input type="text" name="blog_title" placeholder="title" class="form-control" value="{{$blog->blog_title}}">
                        </div>

                        <div class="form-group">
                            {{Form::textarea('blog_body', $blog->blog_body, ['id' => 'editor', 'class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                            <label for="blog_image">Upload Image</label>
                            <input type="file" name="blog_image" placeholder="Upload Image" class="form-control-file {{ $errors->has('blog_image') ? ' is-invalid' : '' }}" id="imgInp">
                            @if ($errors->has('blog_image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('blog_image') }}</strong>
                            </span>
                            @endif
                            <img id='img-upload'/>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary pull-right p-5">Save</button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            <!-- END BLOG SECTION -->

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection

@section('scripts')
<script src="{{URL::to('/')}}/node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( error => {
        console.error( 'There was a problem initializing the editor.', error );
    } );
</script>

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


