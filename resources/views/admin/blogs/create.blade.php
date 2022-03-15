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
                    <h3 class="panel-title">Write something interesting</h3>
                    <p class="panel-subtitle">Today: {{ date('D, M Y') }}</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-pencil"></i></span>
                                <p>
                                    <span class="number">1,252</span>
                                    <span class="title">Your Writings</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-bookmark"></i></span>
                                <p>
                                    <span class="number">203</span>
                                    <span class="title">Drafts</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">274,678</span>
                                    <span class="title">Published</span>
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

                        {!! Form::open(['class' => '', 'enctype' => 'multipart/form-data', 'action' => 'BlogController@store', 'method' => 'POST']) !!}
                        @csrf
                        <div class="form-group">
                            <label for="blog_title">Title</label>
                            <input type="text" name="blog_title" placeholder="title" class="form-control">
                        </div>

                        <div class="form-group">
                            {{Form::textarea('blog_body', '', ['id' => 'editor', 'class' => 'form-control'])}}
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



@section('footer')
@include('layouts.admin.footer')
@endsection

@section('scripts')
<script src="{{URL::to('/')}}/node_modules/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endsection
