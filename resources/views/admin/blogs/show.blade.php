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
            <div class="panel panel-headline">
                <div class="panel-body">
                    <div class="row">
                        <div class="article-header">
                            <h2 class="entry-title text-capitalize">{{$blog->blog_title}}</h2>
                        </div>
                        <div class="article-content">
                            <section>{!! $blog->blog_body !!}</section>
                        </div>
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
