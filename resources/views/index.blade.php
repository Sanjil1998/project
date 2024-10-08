@extends('layouts.layout')

@section('content')


        <!--========== SLIDER ==========-->
        @if($totalbanner>0)
        @foreach($banner as $banners)
        <div class="promo-block parallax-window" data-parallax="scroll" data-image-src="{{getImage($banners->banner_image) }}">
        @endforeach
        @else
        <div class="promo-block parallax-window" data-parallax="scroll" data-image-src="{{URL::to('/')}}/extra/img/1920x1080/03.jpg">
        @endif
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="promo-block-divider">
                            <h1 class="promo-block-title">Sanjil <br/> Shakya</h1>
                            <p class="promo-block-text">Travel Loving Person &amp; Passion for designing</p>
                        </div>
                        <ul class="list-inline">
                            @if(count($profile)>0)
                            @foreach($profile as $profiles)

                            <li><a href="{{$profiles->facebook}}" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="{{$profiles->twitter}}" class="social-icons"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="{{$profiles->instagram}}" class="social-icons"><i class="icon-social-instagram"></i></a></li>
                            <li><a href="{{$profiles->linkedin}}" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                            @endforeach
                            @endif
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
                            @foreach($skill as $skills)

                            <h5>{{ $skills->skill_name }} <span class="color-heading pull-right">{{ $skills->skill_level }}%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-orange" role="progressbar" data-width="{{ $skills->skill_level }}"></div>
                            </div>

                            @endforeach

                        </div>
                        <!-- End Progress Box -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End About -->

        <!-- Experience -->

        @if($totalexperience>0)
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
                                @foreach($experience as $experiences)
                                <div class="col-md-4 md-margin-b-4">
                                    <div class="service" data-height="height">
                                        <div class="service-element">
                                            <i class="service-icon icon-badge"></i>
                                        </div>
                                        <div class="service-info">
                                            <h3>{{$experiences->experience_title}}</h3>
                                            <p class="margin-b-5">{{substr($experiences->experience_description, 0, 120)}} ...</p>
                                        </div>
                                        <a href="#" class="content-wrapper-link" data-toggle="modal" data-target="#modal_{{$experiences->id}}"></a>
                                        <div class="modal fade" id="modal_{{$experiences->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLongTitle">{{$experiences->experience_title}}</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <p>{!!$experiences->experience_description!!}</p>
                                                <p>{!!$experiences->experience_duties!!}</p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hide</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if($totalexperience>3)
                                <a href="{{route('experience.index')}}" class="btn bg-color-orange text-white pull-right btn-view-more">View More</a>
                                @endif
                            </div>
                            <!--// end row -->
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>
        @endif

        <!-- End Experience -->



        <!-- Work -->
        @if($totalwork>0)
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
                            @foreach($work as $works)
                            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-6 margin-b-4">
                                <!-- Work -->
                                <div class="work work-popup-trigger">
                                    <div class="work-overlay">
                                        <img class="full-width img-responsive img-thumbnail" src="{{getImage($works->work_image)}}" alt="Portfolio Image" style="width: 400px; height: 280px; margin: 0px auto">
                                    </div>
                                    <div class="work-popup-overlay">
                                        <div class="work-popup-content">
                                            <a href="javascript:void(0);" class="work-popup-close">Hide</a>
                                            <div class="margin-b-30">
                                                <h3 class="margin-b-5">{{$works->work_title}}</h3>
                                                <span>{{$works->work_subtitle}}</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 work-popup-content-divider sm-margin-b-20">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p>{!! $works->work_description !!}</p>
                                                        <p><a href="{{$works->work_links}}" target="_blank">{{$works->work_links}}</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        @if(($works->work_leader) !== NULL)
                                                        <p class="margin-b-5"><strong>Project Done:</strong> {{$works->work_leader}}</p>
                                                        @endif
                                                        @if(($works->work_provider) !== NULL)
                                                        <p class="margin-b-5"><strong>Customer:</strong> {{$works->work_provider}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Work -->
                            </div>
                            @endforeach
                            @if($totalwork>4)
                            <a href="{{route('work.index')}}" class="btn bg-color-orange text-white pull-right btn-view-more">View More</a>
                            @endif

                        </div>
                        <!-- End Masonry Grid -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        @endif
        <!-- End Work -->

        <!-- Gallery -->
        @if($totalgallery>0)
        <div id="gallery">
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-3 sm-margin-b-30">
                        <div class="text-right sm-text-left">
                            <h2 class="margin-b-0">Gallery</h2>
                            <p>Glimpses of my life.</p>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-1">
                        <!-- gallery row starts -->

                        <div class="row">
                            <div class="gallery col-md-12">
                                @foreach($gallery as $galleries)
                                <div class="col-xs-12 col-sm-6 col-md-6 margin-b-5">
                                    <a href="{{getImage($galleries->image, 'normal') }}" class="big">
                                        <img class="full-width img-responsive img-fluid img-thumbnail object-fit-img" src="{{getImage($galleries->image, 'large') }}" alt="" style="height: 300px;" title="{{$galleries->image_title}}"/>
                                    </a>
                                </div>
                                @endforeach
                                    <div class="clear"></div>
                                    @if($totalgallery>4)
                                    <a href="{{route('gallery.home')}}" class="btn bg-color-orange text-white pull-right btn-view-more">View More</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- gallery row ends -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        @endif
        <!-- End Gallery -->

        <!-- Blog -->
        @if($totalBlog>0)
        <div id="blog">
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-3 sm-margin-b-30">
                        <div class="text-right sm-text-left">
                            <h2 class="margin-b-0">Blog</h2>
                            <p>Some of my writings</p>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-1">
                        <!-- blog row starts -->

                        <div class="row">
                            <div class="blog col-md-12">
                                @foreach($blog as $blogs)

                                        <div class="col-md-6 col-xl-6">
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
                                                            <h2 class="entry-title text-capitalize"><a href="{{route('blog.blogShow', $blogs->id)}}">{{$blogs->blog_title}}</a></h2>
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
                                                                    <a href="{{route('blog.blogShow', $blogs->id)}}" class="more-link">Read More</a>
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
                                    <div class="clear"></div>
                                    @if($totalBlog>4)
                                    <a href="{{route('blog.index')}}" class="btn bg-color-orange text-white pull-right btn-view-more">View More</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- blog row ends -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        @endif
        <!-- End Blog -->

        <!-- Contact -->
        <div id="contact">
            <div class="bg-color-sky-light">
                <div class="container content-lg">
                    <div class="row">
                        <div class="col-sm-3 sm-margin-b-30">
                            <div class="text-right sm-text-left">
                                <h2 class="margin-b-0">Get in touch</h2>
                                <p>Contact me</p>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-1">
                            @foreach($profile as $profiles)
                            <div class="row">
                                <div class="col-md-4 col-xs-6 md-margin-b-30">
                                    <h5>Location</h5>
                                    <a href="#">{{$profiles->address}}</a>
                                </div>
                                <div class="col-md-4 col-xs-6 md-margin-b-30">
                                    <h5>Phone</h5>
                                    <a href="tel:{{$profiles->phone}}">{{$profiles->phone}}</a>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <h5>Email</h5>
                                    <a href="mailto:{{$profiles->gmail}}">{{$profiles->gmail}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>
        <!-- End Contact -->
        <!--========== END PAGE LAYOUT ==========-->


@endsection

@section('scripts')
<script>
    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
</script>
@endsection
