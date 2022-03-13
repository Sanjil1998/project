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

                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-list"></i></span>
                                <p>
                                    <span class="number">{{count($document)}}</span>
                                    <span class="title">Files</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->

            <div class="col-md-6">

                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header">Upload your file</div>

                        <div class="card-body">
                            @if ($message = Session::get('success'))

                            <div class="alert alert-success alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong>{{ $message }}</strong>

                            </div>
                            @endif

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{route('admin.profile.files.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="guide">Before uploading a new cv, make sure you delete the old one. For the CV, the name of the file must be <i>"CV-Sanjil-Shakya.pdf"</i></label>
                                    <input type="file" class="form-control-file" name="file[]" id="file" multiple="">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">



                    <!-- BASIC TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Your Files</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>File</th>
                                        <th>Created At</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                @foreach($document as $documents)
                                <tbody>
                                    <tr>
                                        <td>{{$documents->id}}</td>
                                        <td><a href="{{URL::to('/')}}/public/files/{{$documents->file}}">{{$documents->file}}</a></td>
                                        <td>{{$documents->created_at}}</td>
                                        <td colspan="2">
                                            {!! Form::open(['action' => ['FileController@destroy', $documents->id], 'method'=>'POST', 'class' => 'pl-0 pr-0' ]) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Confirm to delete.");'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE -->

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
