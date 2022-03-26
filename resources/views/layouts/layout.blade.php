<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- HEAD TAG STARTS -->
<head>
    <meta charset="utf-8"/>
    <title>Sanjil Shakya| My Curriculum Viti</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="sanjilshakya" name="author"/>

    <!-- GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/')}}/public/extra/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/public/extra/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="{{URL::to('/')}}/public/css/addon-css/animate.css" rel="stylesheet">

    <!-- THEME STYLES -->
    <link href="{{URL::to('/')}}/public/css/addon-css/layout.css" rel="stylesheet" type="text/css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico"/>

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/public/css/addon-css/styles.css">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::to('/')}}/public/assets/img/favicon.png">
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/css/custom.css">


    <!-- Simple Lightbox Styles -->
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/vendor/simplelightbox/simple-lightbox.css">

    <!-- Font-awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/public/assets/vendor/font-awesome/css/font-awesome.min.css">
</head>
<!-- HEAD TAG ENDS -->

<!-- BODY TAG STARTS -->
<body id="body" data-spy="scroll" data-target=".header">

    <!--========== HEADER ==========-->
    <header class="header navbar-fixed-top">
        <!-- Navbar -->
        <nav class="navbar" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="menu-container js_nav-item">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="toggle-icon"></span>
                    </button>
                    <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="{!! url('/'); !!}">
                                <img src="{{URL::to('/')}}/public/assets/img/new-my-logo-transparent.png" alt="">
                                <!-- <h3 class="text-color-custom">Sanjil Shakya</h3> -->
                            </a>
                        </div>
                    <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="nav navbar-nav navbar-nav-right">
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}">Home</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#about">About</a></li>
                                @if(request()->segment(1) == '')
                                @if($totalexperience>0)
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#experience">Experience</a></li>
                                @endif
                                @if($totalwork>0)
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#work">Work</a></li>
                                @endif
                                @if($totalgallery>0)
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#gallery">Gallery</a></li>
                                @endif
                                @if($totalBlog>0)
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#blog">Blog</a></li>
                                @endif
                                @endif


                                @if(request()->segment(1) == 'gallery' || request()->segment(1) == 'experience' || request()->segment(1) == 'work')

                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#experience">Experience</a></li>

                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#work">Work</a></li>
                                
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#gallery">Gallery</a></li>

                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#blog">Blogs</a></li>

                                @endif
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/#contact">Contact</a></li>
                                <!-- <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{!! url('/'); !!}/blogs">Blogs</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->

        @yield('content')


        <!--========== FOOTER ==========-->

        <footer class="{{ (request()->segment(1) == 'blogs') ? 'hidden' : '' }} footer" >
            <div class="content container">
                <div class="row">
                    <div class="col-xs-6">
                        @if(request()->segment(1) !== 'gallery')
                        @if(request()->segment(1) !== 'experience')
                        @if(request()->segment(1) !== 'work')
                        @foreach($document as $documents)
                            <a href="{{URL::to('/')}}/public/files/{{$documents->file}}"  class="btn bg-color-orange text-white btn-view-more">Download CV</a>
                        @endforeach
                        @endif
                        @endif
                        @endif
                    </div>
                    <div class="col-xs-6 text-right sm-text-left">
                        <p class="margin-b-0"><a class="fweight-700 pointer" onclick="window.location.reload();">Curriculum Viti (<?php echo date('Y') ?>)</a> Developed By: <a class="fweight-700 pointer" onclick="window.location.reload();">Sanjil Shakya</a></p>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </footer>

        <footer class="{{ (request()->segment(1) != 'blogs') ? 'hidden' : '' }} footer">

        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="public/extra/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="public/extra/vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="public/extra/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="public/extra/vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="public/extra/vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="public/extra/vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="public/extra/vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="public/extra/vendor/jquery.parallax.min.js" type="text/javascript"></script>
        <script src="public/extra/vendor/jquery.appear.js" type="text/javascript"></script>
        <script src="public/extra/vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="public/extra/vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="public/extra/js/layout.min.js" type="text/javascript"></script>
        <script src="public/extra/js/components/progress-bar.min.js" type="text/javascript"></script>
        <script src="public/extra/js/components/masonry.min.js" type="text/javascript"></script>
        <script src="public/extra/js/components/wow.min.js" type="text/javascript"></script>

        <!-- Simple LightBox Scripts -->
        <script src="{{URL::to('/')}}/public/assets/vendor/simplelightbox/simple-lightbox.js"></script>

        @yield('scripts')

    </body>
    <!-- END BODY -->
    </html>
