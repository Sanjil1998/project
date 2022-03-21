@extends('layouts.admin.admin-layout')

@section('header')
@include('layouts.admin.header')
@endsection

@section('content')

<!-- MAIN -->
<div class="main">
    <!-- Page content-->
    <div class="container mt-5" style="width: 100%">
        <div class="row">
            <div class="col-lg-12">
                <!-- Post content-->
                <div class="panel panel-content">
                    <div class="panel-body">
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{$blog->blog_title}}</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Posted on {{$blog->created_at->format('D, M Y')}} by <span class="text-capitalize">{{$blog->user->name}}</span></div>
                                <!-- Post categories-->
                                {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a> --}}
                                {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> --}}
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-10"><img class="img-fluid rounded center-img" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..."/></figure>
                            <!-- Post content-->
                            <section class="mb-10">
                                {!! $blog->blog_body !!}
                            </section>
                        </article>
                    </div>
                </div>
                
                <!-- Comments section-->
                
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
