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
                    <h3 class="panel-title">Work Overview</h3>
                    <p class="panel-subtitle">Today: {{ date('yy-m-d') }}</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- END OVERVIEW -->

            <div class="col-md-12">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Works</h3>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['class' => 'md-form', 'enctype' => 'multipart/form-data', 'action' => ['ProfileController@work_update', $work->id], 'method' => 'POST']) !!}
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="work_title">Work Title</label>
                                    <input type="text" value="{{ $work->work_title }}" name="work_title" placeholder="Work Title" required="" class="form-control {{ $errors->has('work_title') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('work_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('work_title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="work_subtitle">Work Subtitle</label>
                                    <input type="text" value="{{ $work->work_subtitle }}" name="work_subtitle" placeholder="Work Subtitle" required="" class="form-control {{ $errors->has('work_subtitle') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('work_subtitle'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('work_subtitle') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="work_description">Work Description</label>
                                    {{Form::textarea('work_description', $work->work_description, ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Work Description'], 'required')}}
                                </div>

                                <div class="form-group">
                                    <label for="work_image">Work Image</label>
                                    <input type="file" value="{{ $work->work_image }}" name="work_image" placeholder="Work Image" required="" class="form-control-file {{ $errors->has('work_image') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('work_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('work_image') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="work_links">Work Links</label>
                                    <input type="text" value="{{ $work->work_links }}" name="work_links" placeholder="Work Links" required="" class="form-control {{ $errors->has('work_links') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('work_links'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('work_links') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="work_details">Work Details</label>
                                    <input type="text" value="{{ $work->work_leader }}" name="work_leader" placeholder="Work Leader" class="form-control {{ $errors->has('work_leader') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('work_leader'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('work_leader') }}</strong>
                                    </span>
                                    @endif

                                    <br>

                                    <input type="text" value="{{ $work->work_provider }}" name="work_provider" placeholder="Work Provider" class="form-control {{ $errors->has('work_provider') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('work_provider'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('work_provider') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="pull-right pt-4">
                                    <button class="btn btn-primary">Update Work</button>
                                    <input type="reset" class=" btn btn-danger">
                                </div>

                            {!! Form::close() !!}

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
