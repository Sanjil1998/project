@extends('layouts.layout')

@section('content')


        <!--========== SLIDER ==========-->
        <div class="promo-block parallax-window" data-parallax="scroll" data-image-src="public/extra/img/1920x1080/03.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="promo-block-divider">
                            <h1 class="promo-block-title">Sanjil <br/> Shakya</h1>
                            <p class="promo-block-text">Travel Loving Person &amp; Passion for designing</p>
                        </div>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/19SanjilShakya98" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="https://twitter.com/sanjilshakya" class="social-icons"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/19_sanjil_shakya_98/" class="social-icons"><i class="icon-social-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/sanjil-shakya-23642b136" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about">
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-3 sm-margin-b-30">
                        <div class="text-right sm-text-left">
                            <h2 class="margin-b-0">Intro</h2>
                            <p>Who am I??</p>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-1">
                        <div class="margin-b-60">
                            @foreach($about as $abouts)
                            <p>{!! $abouts->body !!}</p>
                            @endforeach
                        </div>

                        <!-- Progress Box -->
                        <div class="progress-box">
                            <h5>HTML5 <span class="color-heading pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>JavaSript <span class="color-heading pull-right">40%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width=40></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>CSS <span class="color-heading pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="70"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Photoshop <span class="color-heading pull-right">60%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="60"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>PHP - Laravel Framework <span class="color-heading pull-right">30%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="30"></div>
                            </div>
                        </div>
                        <!-- End Progress Box -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End About -->

        <!-- Experience -->
        <div id="experience">
            <div class="bg-color-sky-light" data-auto-height="true">
                <div class="container content-lg">
                    <div class="row">
                        <div class="col-sm-3 sm-margin-b-30">
                            <div class="text-right sm-text-left">
                                <h2 class="margin-b-0">Experience</h2>
                                <p>Here's my work profile.</p>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <div class="row row-space-2 margin-b-4">
                                <div class="col-md-4 md-margin-b-4">
                                    <div class="service" data-height="height">
                                        <div class="service-element">
                                            <i class="service-icon icon-chemistry"></i>
                                        </div>
                                        <div class="service-info">
                                            <h3>Digital Journal</h3>
                                            <p class="margin-b-5">Designed an entire web application in Laravel framework as a college project.</p>
                                        </div>
                                        <a href="#" class="content-wrapper-link"></a>
                                    </div>
                                </div>
                                <div class="col-md-4 md-margin-b-4">
                                    <div class="service bg-color-base wow zoomIn" data-height="height" data-wow-duration=".3" data-wow-delay=".1s">
                                        <div class="service-element">
                                            <i class="service-icon color-white icon-screen-tablet"></i>
                                        </div>
                                        <div class="service-info">
                                            <h3 class="color-white">Photoshop</h3>
                                            <p class="color-white margin-b-5">Designed the mockup for the website to be designed.</p>
                                        </div>
                                        <a href="#" class="content-wrapper-link"></a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="service" data-height="height">
                                        <div class="service-element">
                                            <i class="service-icon icon-badge"></i>
                                        </div>
                                        <div class="service-info">
                                            <h3>Front-end</h3>
                                            <p class="margin-b-5">Designed the website for Shree Sushil English Boarding School</p>
                                        </div>
                                        <a href="https://shreesushillsebs.com/" class="content-wrapper-link"></a>
                                    </div>
                                </div>
                            </div>
                            <!--// end row -->
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>
        <!-- End Experience -->

        <!-- Work -->
        <div id="work">
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-3 sm-margin-b-30">
                        <div class="text-right sm-text-left">
                            <h2 class="margin-b-0">Works</h2>
                            <p>I develop and design HAPPINESS.</p>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-1">
                        <!-- Masonry Grid -->
                        <div class="masonry-grid row row-space-2">
                            <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>
                            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-6 margin-b-4">
                                <!-- Work -->
                                <div class="work work-popup-trigger">
                                    <div class="work-overlay">
                                        <img class="full-width img-responsive" src="public/extra/img/397x300/03.jpg" alt="Portfolio Image" style="width: 800px; height: 400px;">
                                    </div>
                                    <div class="work-popup-overlay">
                                        <div class="work-popup-content">
                                            <a href="javascript:void(0);" class="work-popup-close">Hide</a>
                                            <div class="margin-b-30">
                                                <h3 class="margin-b-5">Art Of Coding</h3>
                                                <span>Clean &amp; Minimalistic Design</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 work-popup-content-divider sm-margin-b-20">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p>I got this project through my friend Nitesh, who participated on this project as a project leader. Shree Sushil English Boarding School is recognized by the government of Nepal. The main motive of this school is to provide quality education to all the childrens of the respective area of Musikot.</p>
                                                        <p>There was a basic requirement for the customer Mr. Bibek Budha which was to design a static website for the online life of the school. The project was completed within a week where the mockup and the images had to be photoshopped and then converted into the HTML format.</p>
                                                        <p><a href="https://shreesushillsebs.com/">Shree Sushil English Boarding School</a></p>
                                                        <ul class="list-inline work-popup-tag">
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Design,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Coding,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Use of Photoshop</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p class="margin-b-5"><strong>Project Leader:</strong> Nitesh Karmacharya</p>
                                                        <p class="margin-b-5"><strong>Designer:</strong> Sanjil Shakya</p>
                                                        <p class="margin-b-5"><strong>Developer:</strong> - </p>
                                                        <p class="margin-b-5"><strong>Customer:</strong> Bibek Budha</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Work -->
                            </div>
                            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-6 margin-b-4">
                                <!-- Work -->
                                <div class="work work-popup-trigger">
                                    <div class="work-overlay">
                                        <img class="full-width img-responsive" src="public/extra/img/397x300/03.jpg" alt="Portfolio Image" style="width: 800px; height: 400px;">
                                    </div>
                                    <div class="work-popup-overlay">
                                        <div class="work-popup-content">
                                            <a href="javascript:void(0);" class="work-popup-close">Hide</a>
                                            <div class="margin-b-30">
                                                <h3 class="margin-b-5">Art Of Coding</h3>
                                                <span>Clean &amp; Minimalistic Design</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 work-popup-content-divider sm-margin-b-20">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p>I got this project through my friend Nitesh, who participated on this project as a project leader. Shree Sushil English Boarding School is recognized by the government of Nepal. The main motive of this school is to provide quality education to all the childrens of the respective area of Musikot.</p>
                                                        <p>There was a basic requirement for the customer Mr. Bibek Budha which was to design a static website for the online life of the school. The project was completed within a week where the mockup and the images had to be photoshopped and then converted into the HTML format.</p>
                                                        <p><a href="https://shreesushillsebs.com/">Shree Sushil English Boarding School</a></p>
                                                        <ul class="list-inline work-popup-tag">
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Design,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Coding,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Use of Photoshop</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p class="margin-b-5"><strong>Project Leader:</strong> Nitesh Karmacharya</p>
                                                        <p class="margin-b-5"><strong>Designer:</strong> Sanjil Shakya</p>
                                                        <p class="margin-b-5"><strong>Developer:</strong> - </p>
                                                        <p class="margin-b-5"><strong>Customer:</strong> Bibek Budha</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Work -->
                            </div>
                            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-6 margin-b-4">
                                <!-- Work -->
                                <div class="work work-popup-trigger">
                                    <div class="work-overlay">
                                        <img class="full-width img-responsive" src="public/extra/img/397x300/03.jpg" alt="Portfolio Image" style="width: 800px; height: 400px;">
                                    </div>
                                    <div class="work-popup-overlay">
                                        <div class="work-popup-content">
                                            <a href="javascript:void(0);" class="work-popup-close">Hide</a>
                                            <div class="margin-b-30">
                                                <h3 class="margin-b-5">Art Of Coding</h3>
                                                <span>Clean &amp; Minimalistic Design</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 work-popup-content-divider sm-margin-b-20">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p>I got this project through my friend Nitesh, who participated on this project as a project leader. Shree Sushil English Boarding School is recognized by the government of Nepal. The main motive of this school is to provide quality education to all the childrens of the respective area of Musikot.</p>
                                                        <p>There was a basic requirement for the customer Mr. Bibek Budha which was to design a static website for the online life of the school. The project was completed within a week where the mockup and the images had to be photoshopped and then converted into the HTML format.</p>
                                                        <p><a href="https://shreesushillsebs.com/">Shree Sushil English Boarding School</a></p>
                                                        <ul class="list-inline work-popup-tag">
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Design,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Coding,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Use of Photoshop</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p class="margin-b-5"><strong>Project Leader:</strong> Nitesh Karmacharya</p>
                                                        <p class="margin-b-5"><strong>Designer:</strong> Sanjil Shakya</p>
                                                        <p class="margin-b-5"><strong>Developer:</strong> - </p>
                                                        <p class="margin-b-5"><strong>Customer:</strong> Bibek Budha</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Work -->
                            </div>
                            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-6 margin-b-4">
                                <!-- Work -->
                                <div class="work work-popup-trigger">
                                    <div class="work-overlay">
                                        <img class="full-width img-responsive" src="public/extra/img/397x300/03.jpg" alt="Portfolio Image" style="width: 800px; height: 400px;">
                                    </div>
                                    <div class="work-popup-overlay">
                                        <div class="work-popup-content">
                                            <a href="javascript:void(0);" class="work-popup-close">Hide</a>
                                            <div class="margin-b-30">
                                                <h3 class="margin-b-5">Art Of Coding</h3>
                                                <span>Clean &amp; Minimalistic Design</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 work-popup-content-divider sm-margin-b-20">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p>I got this project through my friend Nitesh, who participated on this project as a project leader. Shree Sushil English Boarding School is recognized by the government of Nepal. The main motive of this school is to provide quality education to all the childrens of the respective area of Musikot.</p>
                                                        <p>There was a basic requirement for the customer Mr. Bibek Budha which was to design a static website for the online life of the school. The project was completed within a week where the mockup and the images had to be photoshopped and then converted into the HTML format.</p>
                                                        <p><a href="https://shreesushillsebs.com/">Shree Sushil English Boarding School</a></p>
                                                        <ul class="list-inline work-popup-tag">
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Design,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Coding,</a></li>
                                                            <li class="work-popup-tag-item"><a class="work-popup-tag-link" href="#">Use of Photoshop</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p class="margin-b-5"><strong>Project Leader:</strong> Nitesh Karmacharya</p>
                                                        <p class="margin-b-5"><strong>Designer:</strong> Sanjil Shakya</p>
                                                        <p class="margin-b-5"><strong>Developer:</strong> - </p>
                                                        <p class="margin-b-5"><strong>Customer:</strong> Bibek Budha</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Work -->
                            </div>

                        </div>
                        <!-- End Masonry Grid -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Work -->

        <!-- Contact -->
        <div id="contact">
            <div class="bg-color-sky-light">
                <div class="container content-lg">
                    <div class="row">
                        <div class="col-sm-3 sm-margin-b-30">
                            <div class="text-right sm-text-left">
                                <h2 class="margin-b-0">Contacts</h2>
                                <p>Recruit me</p>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <div class="row">
                                <div class="col-md-4 col-xs-6 md-margin-b-30">
                                    <h5>Location</h5>
                                    <a href="#">Chakupat, Lalitpur</a>
                                </div>
                                <div class="col-md-4 col-xs-6 md-margin-b-30">
                                    <h5>Phone</h5>
                                    <a href="#">+977 9860305729</a>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <h5>Email</h5>
                                    <a href="mailto:shakya.sanjil1998@gmail.com">shakya.sanjil1998@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>
        <!-- End Contact -->
        <!--========== END PAGE LAYOUT ==========-->


@endsection
