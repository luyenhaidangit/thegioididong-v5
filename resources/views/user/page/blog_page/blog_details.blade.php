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
                    </div>
                    @include('user.page.blog_page.col-md-3')
                </div>
            </div>
        </div>
    </div>
@stop
