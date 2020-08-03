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
                    <h3 class="panel-title">About Section</h3>
                    <p class="panel-subtitle">Today: {{ date('D M,Y') }}</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        {!! Form::open(['class' => '', 'enctype' => 'multipart/form-data', 'action' => ['ProfileController@update_about', $about->id], 'method' => 'POST']) !!}
                        @csrf
                        @method('PUT')

                        {!!Form::textarea('body', $about->body, ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Body Text'])!!}

                        <div class="">
                            <a href="{{route('admin.profile.about')}}" class="btn btn-danger pull-right">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>

                        {!! Form::close() !!}
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
<script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endsection



