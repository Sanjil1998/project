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
                                    <span class="number">1,252</span>
                                    <span class="title">Your Writings</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-bookmark"></i></span>
                                <p>
                                    <span class="number">203</span>
                                    <span class="title">Drafts</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">274,678</span>
                                    <span class="title">Visits</span>
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
                                <div class="col-md-4 col-xl-4">
                                    <article class="post">
                                        <div class="article-v2">
                                            <figure class="article-thumb">
                                                <a href="#">
                                                    <img src="https://via.placeholder.com/350x280/FFB6C1/000000" alt="blog image" />
                                                </a>
                                            </figure>
                                            <!-- /.article-thumb -->
                                            <div class="article-content-main">
                                                <div class="article-header">
                                                    <h2 class="entry-title"><a href="#">The day you become better.</a></h2>
                                                    <div class="entry-meta">
                                                        <div class="entry-date">July 25,2017</div>
                                                        <!-- /.entry-date -->
                                                        <div class="entry-cat">
                                                            <a href="#">Halie Rose</a>
                                                        </div>
                                                        <!--  /.entry-cat -->
                                                    </div>
                                                    <!-- /.entry-meta -->
                                                </div>
                                                <!-- /.article-header -->
                                                <div class="article-content">
                                                    <p>Maecenas tempus, tellus eget anyti condimentum rhoncus, sem quam.</p>
                                                </div>
                                                <!--  /.article-content -->
                                                <div class="article-footer">
                                                    <div class="row">
                                                        <div class="col-6 text-left footer-link">
                                                            <a href="#" class="more-link">Read More</a>
                                                        </div>
                                                        <!--  /.col-6 -->
                                                        <div class="col-6 text-right footer-meta">
                                                            <a href="#">65 <i class="pe-7s-comment"></i></a>
                                                            <a href="#">50 <i class="pe-7s-share"></i></a>
                                                        </div>
                                                        <!--  /.col-6 -->
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
                                <!--  /.col-md-6 -->
                
                                <div class="col-md-4 col-xl-4">
                                    <article class="post">
                                        <div class="article-v2">
                                            <figure class="article-thumb">
                                                <a href="#">
                                                    <img src="https://via.placeholder.com/350x280/87CEFA/000000" alt="blog image" />
                                                </a>
                                            </figure>
                                            <!-- /.article-thumb -->
                                            <div class="article-content-main">
                                                <div class="article-header">
                                                    <h2 class="entry-title"><a href="#">The day you become better.</a></h2>
                                                    <div class="entry-meta">
                                                        <div class="entry-date">July 25,2017</div>
                                                        <!-- /.entry-date -->
                                                        <div class="entry-cat">
                                                            <a href="#">Halie Rose</a>
                                                        </div>
                                                        <!--  /.entry-cat -->
                                                    </div>
                                                    <!-- /.entry-meta -->
                                                </div>
                                                <!-- /.article-header -->
                                                <div class="article-content">
                                                    <p>Maecenas tempus, tellus eget anyti condimentum rhoncus, sem quam.</p>
                                                </div>
                                                <!--  /.article-content -->
                                                <div class="article-footer">
                                                    <div class="row">
                                                        <div class="col-6 text-left footer-link">
                                                            <a href="#" class="more-link">Read More</a>
                                                        </div>
                                                        <!--  /.col-6 -->
                                                        <div class="col-6 text-right footer-meta">
                                                            <a href="#">65 <i class="pe-7s-comment"></i></a>
                                                            <a href="#">50 <i class="pe-7s-share"></i></a>
                                                        </div>
                                                        <!--  /.col-6 -->
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
                                <!--  /.col-md-6 -->
                
                                <div class="col-md-4 col-xl-4">
                                    <article class="post">
                                        <div class="article-v2">
                                            <figure class="article-thumb">
                                                <a href="#">
                                                    <img src="https://via.placeholder.com/350x280/20B2AA/000000" alt="blog image" />
                                                </a>
                                            </figure>
                                            <!-- /.article-thumb -->
                                            <div class="article-content-main">
                                                <div class="article-header">
                                                    <h2 class="entry-title"><a href="#">The day you become better.</a></h2>
                                                    <div class="entry-meta">
                                                        <div class="entry-date">July 25,2017</div>
                                                        <!-- /.entry-date -->
                                                        <div class="entry-cat">
                                                            <a href="#">Halie Rose</a>
                                                        </div>
                                                        <!--  /.entry-cat -->
                                                    </div>
                                                    <!-- /.entry-meta -->
                                                </div>
                                                <!-- /.article-header -->
                                                <div class="article-content">
                                                    <p>Maecenas tempus, tellus eget anyti condimentum rhoncus, sem quam.</p>
                                                </div>
                                                <!--  /.article-content -->
                                                <div class="article-footer">
                                                    <div class="row">
                                                        <div class="col-6 text-left footer-link">
                                                            <a href="#" class="more-link">Read More</a>
                                                        </div>
                                                        <!--  /.col-6 -->
                                                        <div class="col-6 text-right footer-meta">
                                                            <a href="#">65 <i class="pe-7s-comment"></i></a>
                                                            <a href="#">50 <i class="pe-7s-share"></i></a>
                                                        </div>
                                                        <!--  /.col-6 -->
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
                                <!--  /.col-md-6 -->
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
