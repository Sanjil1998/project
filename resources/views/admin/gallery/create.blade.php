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
                            <form action="{{route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data" class="md-form">
                                @csrf

                                <div class="form-group">
                                    <label for="image_title">Image Title</label>
                                    <input type="text" name="image_title" placeholder="Image Title" required="" class="form-control {{ $errors->has('image_title') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('image_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" name="image" placeholder="Upload Image" required="" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
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

@section('footer')
@include('layouts.admin.footer')
@endsection
