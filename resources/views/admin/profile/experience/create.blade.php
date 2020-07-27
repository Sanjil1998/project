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
                    <h3 class="panel-title">Experience Overview</h3>
                    <p class="panel-subtitle">Today: {{ date('yy-m-d') }}</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- END OVERVIEW -->

            <div class="col-md-12">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Experiences</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('admin.profile.experience.store')}}" method="POST" enctype="multipart/form-data" class="md-form">
                                @csrf

                                <div class="form-group">
                                    <label for="experience_title">Experience Title</label>
                                    <input type="text" name="experience_title" placeholder="Experience Title" required="" class="form-control {{ $errors->has('experience_title') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('experience_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience_title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="experience_description">Experience Description</label>
                                    {{Form::textarea('experience_description', '', ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Experience Description'], 'required')}}
                                </div>

                                <div class="form-group">
                                    <label for="experience_duties">Duties/Responsibilities</label>
                                    {{Form::textarea('experience_duties', '', ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Duties/Responsibilities'], 'required')}}
                                </div>

                                <div class="pull-right pt-4">
                                    <button class="btn btn-primary">Add Experience</button>
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
