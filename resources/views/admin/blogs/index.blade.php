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
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-pencil"></i></span>
                                <p>
                                    <span class="number">{{$totalBlog}}</span>
                                    <span class="title">Your Writings</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-bookmark"></i></span>
                                <p>
                                    <span class="number">{{$unpublishedBlog}}</span>
                                    <span class="title">Unpublished Blogs</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">{{$publishedBlog}}</span>
                                    <span class="title">Published Blogs</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->

            {{-- BODY CONTENT --}}
            
            
            <div class="panel panel-content">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                {{-- counting number blogs --}}
                                @if (count($blog)>0)
                                
                                    @foreach($blog as $blogs)
                                    
                                        <div class="col-md-4 col-xl-4">
                                            <article class="post">
                                                <div class="article-v2">
                                                    <figure class="article-thumb">
                                                        <a href="#">
                                                            <img src="https://via.placeholder.com/350x280/FFB6C1/000000" alt="blog image" width="95%" class="border_radius"/>
                                                        </a>
                                                    </figure>
                                                    <!-- /.article-thumb -->
                                                    <div class="article-content-main border_radius">
                                                        <div class="article-header">
                                                            <h2 class="entry-title text-capitalize"><a href="{{route('admin.blogs.show', $blogs->id)}}">{{$blogs->blog_title}}</a></h2>
                                                            <div class="entry-meta">
                                                                <div class="entry-date">{{$blogs->created_at->format('Y-m-d')}}</div>
                                                                <!-- /.entry-date -->
                                                                <div class="entry-cat text-capitalize">{{$blogs->user->name}}</div>
                                                                <!--  /.entry-cat -->
                                                            </div>
                                                            <!-- /.entry-meta -->
                                                        </div>
                                                        <!-- /.article-header -->
                                                        <div class="article-content text-justify">
                                                            <section>{!! substr($blogs->blog_body,0,100) !!} ...</section>
                                                        </div>
                                                        <!--  /.article-content -->
                                                        <div class="article-footer">
                                                            <div class="row">
                                                                <div class="col-6 text-left footer-link">
                                                                    <a href="{{route('admin.blogs.show', $blogs->id)}}" class="more-link">Read More</a>
                                                                </div>
                                                            </div>
                                                            <!--  /.row -->
                                                        </div>
                                                        <!--  /.article-footer -->
                                                    </div>
                                                    <!--  /.article-content-main -->
                                                </div>
                                                <!--  /.article-v2 -->
                                            </article>
                                            <!--  /.post -->
                                        </div>

                                    @endforeach

                                @else

                                <div class="alert">
                                    <p>Oops!! No blogs found. Write something amazing <a href="{{route('admin.blogs.create')}}" class="text-uppercase">here</a></p>
                                </div>
                                    
                                @endif
                                
                                
                            </div>
                            <!--  /.blog-carousel -->
                        </div>
                        <!--  /.col-12 -->
                    </div>
                    <!--/.row-->
                </div>
            </div>
            

            {{-- END BODY CONTENT --}}

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection

@section('footer')
@include('layouts.admin.footer')
@endsection
