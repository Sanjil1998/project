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
                    <p class="panel-subtitle">Today: {{ date('D, M Y') }}
                        <a href="{{route('admin.profile.work.add')}}" class="btn btn-primary pull-right">Add Work</a>
                    </p>

                </div>
                <div class="clearfix"></div>
            </div>
            <!-- END OVERVIEW -->

            <div class="col-md-12">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">My Works</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Work Title</th>
                                        <th>Work Subtitle</th>
                                        <th>Work Description</th>
                                        <th>Work Image</th>
                                        <th>Work Link</th>
                                        <th colspan="2">Work Details</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($work as $works)
                                    <tr>
                                        <td>{{$works->work_title}}</td>
                                        <td>{{$works->work_subtitle}}</td>
                                        <td><p>{!!$works->work_description!!}</p></td>
                                        <td><img src="{{getImage($works->work_image)}}" alt="Alt-img" class="img-fluid img-thumbnail" width="200" height="100"></td>
                                        <td>{{$works->work_links}}</td>
                                        <td class="text-red">{{$works->work_leader}}</td>
                                        <td class="text-blue">{{$works->work_provider}}</td>
                                        <td><a href="{{route('admin.profile.work.edit', [$works->id])}}" class="btn btn-warning">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['ProfileController@delete_work', $works->id], 'method'=>'POST', 'class' => 'pl-0 pr-0' ]) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger',  'onclick' => 'return confirm("Confirm to delete.");'])}}
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
