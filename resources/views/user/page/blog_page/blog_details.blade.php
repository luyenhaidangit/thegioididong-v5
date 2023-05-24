@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li><a href="{{route('shopping.blog')}}">Tin tức</a></li>
                    <li class='active'>{!! $blog_detail->blog_title !!}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container" style="margin-bottom: 30px">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <h1 style="margin-top: 0px;">{!! $blog_detail->blog_title !!}</h1>
                            <span class="author">{{$blog_detail->blog_author}}</span>
                            <span class="review">7 Comments</span>
                            <span class="date-time">{{$blog_detail->blog_time}}</span>
                            <p>{!! $blog_detail->blog_description !!}</p>
                            <div class="social-media" style="padding: 5px 5px;border: 1px solid #e3e3e3;text-align: center;background: #f5f5f5;margin: 0px;">
                                <span>Chia sẻ bài viết ngay:</span>
                                <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]={{request()->url()}}','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="Share on Facebook" href="javascript:"><i class="fa fa-facebook"></i></a>
                                <a onclick="popUp=window.open('http://twitter.com/home?status=Post with Shortcodes {{request()->url()}}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on Twitter" href="javascript:;"><i class="fa fa-twitter"></i></a>
                                <a onclick="popUp=window.open('http://vk.com/share.php?url={{request()->url()}}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on VK" href="javascript:;">
                                    <i class="fa fa-vk"></i>
                                </a>
                                <a data-toggle="tooltip" title="Share on Pinterest" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url={{request()->url()}};description=AllStore HTML Template&amp;media=http://discover.real-web.pro/wp-content/uploads/2016/09/insect-1130497_1920.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                                <a data-toggle="tooltip" title="Share on Google +1" href="javascript:;" onclick="popUp=window.open('https://plus.google.com/share?url={{request()->url()}}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a data-toggle="tooltip" title="Share on Linkedin" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url={{request()->url()}};title=AllStore HTML Template','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
{{--                        <div class="blog-post-author-details wow fadeInUp">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <img src="assets\images\testimonials\member3.png" alt="Responsive image"--}}
{{--                                         class="img-circle img-responsive">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-10">--}}
{{--                                    <h4>John Doe</h4>--}}
{{--                                    <div class="btn-group author-social-network pull-right">--}}
{{--                                        <span>Follow me on</span>--}}
{{--                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                                            <i class="twitter-icon fa fa-twitter"></i>--}}
{{--                                            <span class="caret"></span>--}}
{{--                                        </button>--}}
{{--                                        <ul class="dropdown-menu" role="menu">--}}
{{--                                            <li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li>--}}
{{--                                            <li><a href="#"><i class="icon fa fa-linkedin"></i>Linkedin</a></li>--}}
{{--                                            <li><a href=""><i class="icon fa fa-pinterest"></i>Pinterst</a></li>--}}
{{--                                            <li><a href=""><i class="icon fa fa-rss"></i>RSS</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <span class="author-job">Web Designer</span>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
{{--                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="blog-review wow fadeInUp">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <h3 class="title-review-comments">16 comments</h3>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2">--}}
{{--                                    <img src="assets\images\testimonials\member1.png" alt="Responsive image"--}}
{{--                                         class="img-rounded img-responsive">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">--}}
{{--                                    <div class="blog-comments inner-bottom-xs">--}}
{{--                                        <h4>Jone doe</h4>--}}
{{--                                        <span class="review-action pull-right">--}}
{{--					03 Day ago &sol;--}}
{{--					<a href=""> Repost</a> &sol;--}}
{{--					<a href=""> Reply</a>--}}
{{--				</span>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
{{--                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
{{--                                            veniam</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="blog-comments-responce outer-top-xs ">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-2 col-sm-2">--}}
{{--                                                <img src="assets\images\testimonials\member2.png" alt="Responsive image"--}}
{{--                                                     class="img-rounded img-responsive">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-10 col-sm-10 outer-bottom-xs">--}}
{{--                                                <div class="blog-sub-comments inner-bottom-xs">--}}
{{--                                                    <h4>Sarah Smith</h4>--}}
{{--                                                    <span class="review-action pull-right">--}}
{{--								03 Day ago &sol;--}}
{{--								<a href=""> Repost</a> &sol;--}}
{{--								<a href=""> Reply</a>--}}
{{--							</span>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do--}}
{{--                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut--}}
{{--                                                        enim ad minim veniam</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2 col-sm-2">--}}
{{--                                                <img src="assets\images\testimonials\member3.png" alt="Responsive image"--}}
{{--                                                     class="img-rounded img-responsive">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-10 col-sm-10">--}}
{{--                                                <div class=" inner-bottom-xs">--}}
{{--                                                    <h4>Stephen</h4>--}}
{{--                                                    <span class="review-action pull-right">--}}
{{--								03 Day ago &sol;--}}
{{--								<a href=""> Repost</a> &sol;--}}
{{--								<a href=""> Reply</a>--}}
{{--							</span>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do--}}
{{--                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut--}}
{{--                                                        enim ad minim veniam</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2">--}}
{{--                                    <img src="assets\images\testimonials\member4.png" alt="Responsive image"--}}
{{--                                         class="img-rounded img-responsive">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-10 col-sm-10">--}}
{{--                                    <div class="blog-comments inner-bottom-xs outer-bottom-xs">--}}
{{--                                        <h4>Saraha Smith</h4>--}}
{{--                                        <span class="review-action pull-right">--}}
{{--					03 Day ago &sol;--}}
{{--					<a href=""> Repost</a> &sol;--}}
{{--					<a href=""> Reply</a>--}}
{{--				</span>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
{{--                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
{{--                                            veniam</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2">--}}
{{--                                    <img src="assets\images\testimonials\member1.png" alt="Responsive image"--}}
{{--                                         class="img-rounded img-responsive">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-10 col-sm-10">--}}
{{--                                    <div class="blog-comment inner-bottom-xs">--}}
{{--                                        <h4>Mark Doe</h4>--}}
{{--                                        <span class="review-action pull-right">--}}
{{--					03 Day ago &sol;--}}
{{--					<a href=""> Repost</a> &sol;--}}
{{--					<a href=""> Reply</a>--}}
{{--				</span>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
{{--                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
{{--                                            veniam</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post-load-more col-md-12"><a class="btn btn-upper btn-primary" href="#">Load--}}
{{--                                        more</a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <h4>Leave A Comment</h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <form class="register-form" role="form">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="info-title" for="exampleInputName">Your Name--}}
{{--                                                <span>*</span></label>--}}
{{--                                            <input type="email" class="form-control unicase-form-control text-input"--}}
{{--                                                   id="exampleInputName" placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <form class="register-form" role="form">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="info-title" for="exampleInputEmail1">Email Address--}}
{{--                                                <span>*</span></label>--}}
{{--                                            <input type="email" class="form-control unicase-form-control text-input"--}}
{{--                                                   id="exampleInputEmail1" placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <form class="register-form" role="form">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="info-title" for="exampleInputTitle">Title--}}
{{--                                                <span>*</span></label>--}}
{{--                                            <input type="email" class="form-control unicase-form-control text-input"--}}
{{--                                                   id="exampleInputTitle" placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <form class="register-form" role="form">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="info-title" for="exampleInputComments">Your Comments--}}
{{--                                                <span>*</span></label>--}}
{{--                                            <textarea class="form-control unicase-form-control"--}}
{{--                                                      id="exampleInputComments"></textarea>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12 outer-bottom-small m-t-20">--}}
{{--                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit--}}
{{--                                        Comment--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    @include('user.page.blog_page.col-md-3')
                </div>
            </div>
        </div>
    </div>
@stop
