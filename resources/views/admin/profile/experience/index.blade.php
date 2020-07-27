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
                    <p class="panel-subtitle">Today: {{ date('yy-m-d') }}
                        <a href="{{route('admin.profile.experience.add')}}" class="btn btn-primary pull-right">Add Experience</a>
                    </p>

                </div>
                <div class="clearfix"></div>
            </div>
            <!-- END OVERVIEW -->

            <div class="col-md-12">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">My Experiences</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Experience Title</th>
                                        <th>Experience Description</th>
                                        <th>Duties/Responsibilities</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($experience as $experiences)
                                    <tr>
                                        <td>{{$experiences->experience_title}}</td>
                                        <td><p>{!!$experiences->experience_description!!}</p></td>
                                        <td><p>{!!$experiences->experience_duties!!}</p></td>
                                        <td><a href="{{route('admin.profile.experience.edit', [$experiences->id])}}" class="btn btn-warning">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['ProfileController@delete_experience', $experiences->id], 'method'=>'POST', 'class' => 'pl-0 pr-0' ]) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
