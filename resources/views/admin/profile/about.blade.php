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
                    <p class="panel-subtitle">Today: {{ date('yy-m-d') }}</p>
                </div>
                <div class="panel-body">
                    @if(count($about) == 0)
                    <div class="row">
                        {!! Form::open(['class' => '', 'enctype' => 'multipart/form-data', 'action' => 'ProfileController@store_about', 'method' => 'POST']) !!}
                        @csrf

                        {{Form::textarea('body', '', ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}

                        <div class="">
                            <button type="submit" class="btn btn-primary pull-right p-5">Save</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    @endif
                </div>
            </div>
            <!-- END OVERVIEW -->

            <!-- about display section -->

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Your About</h3>
                </div>
                <div class="panel-body">
                    @if(count($about) > 0 )
                    <table class="table">
                        <thead>
                            <tr>
                                <th>About Content</th>
                                <th>Created At</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        @foreach($about as $abouts)
                        <tbody>
                            <tr>
                                <td><p>{!!$abouts->body!!}</p></td>
                                <td>{{$abouts->created_at}}</td>
                                <td colspan="2">
                                    <a href="{{route('admin.profile.about.edit', [$abouts->id])}}" class="btn btn-warning">Edit</a>
                                    {!! Form::open(['action' => ['ProfileController@delete_about', $abouts->id], 'method'=>'POST', 'class' => 'pl-0 pr-0' ]) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @else
                    <p>Your about section is null</p>
                    @endif
                </div>
            </div>

            <!-- about display section ends -->

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
@endsection



