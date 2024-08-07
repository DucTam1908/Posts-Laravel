@extends('client.layouts.master')

@section('banner')
    <h2 class="text-center my-3 ">Đây là tin tức : {{$detail->title}} </h2>
@endsection

@section('content')
@php
                $date_one = $detail->created_at;
                $date_day = date('d', strtotime($date_one));
                $date_M = date('m', strtotime($date_one));
                $date_Y = date('Y', strtotime($date_one));
                $date =
                    'Ngày' . ' ' . $date_day . ' ' . 'Tháng' . ' ' . $date_M . ' ' . 'Năm' . ' ' . $date_Y;
            @endphp
<div class="col-md-8 loop-large-post" id="content">
    <div class="widget_container content_page"><!-- start post -->
        <div class="post-2961 post type-post status-publish format-gallery has-post-thumbnail hentry category-sports tag-relaxing tag-shooting post_format-post-format-gallery"
            id="post-2961">
            <div class="single_section_content box blog_large_post_style">
                <div class="jl_single_style2">
                    <div
                        class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                        <span class="meta-category-small single_meta_category"><a
                                class="post-category-color-text" style="background:#62ce5c"
                                href="#">{{$detail->cate}}</a></span>
                        <h1 class="single_post_title_main">{{$detail->title}}</h1>
                        <p class="post_subtitle_text">{{$detail->short_description}}</p> <span
                            class="jl_post_meta"><span class="jl_author_img_w"><i
                                    class="jli-user"></i><a href="#" title="Posts by Spraya"
                                    rel="author">{{$detail->name}}</a></span><span class="post-date"><i
                                    class="jli-pen"></i>{{$date}}</span><span class="meta-comment"><i
                                    class="jli-comments"></i><a href="#">0
                                    Comment</a></span></span>
                    </div>
                    <div class="jl_slide_wrap_s jl_clear_at">
                        <div class="jl_ar_top jl_clear_at">
                            <div class="jl-w-slider jl_full_feature_w">
                                <div class="jl-eb-slider jelly_loading_pro" data-arrows="true"
                                    data-play="true" data-effect="false" data-speed="500"
                                    data-autospeed="7000" data-loop="true" data-dots="true"
                                    data-swipe="true" data-items="1" data-xs-items="1"
                                    data-sm-items="1" data-md-items="1" data-lg-items="1"
                                    data-xl-items="1">
                                    <div class="slide">
                                        <div class="slide-inner jl_radus_e"><img
                                                src="img/adam-jaime-dmkmrNptMpw-unsplash-1000x650.jpg"
                                                alt="" />
                                            <div class="background_over_image"></div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="slide-inner jl_radus_e"><img
                                                src="img/have-fun-do-good-MyhbXgx2DTk-unsplash-1000x650.jpg"
                                                alt="" />
                                            <div class="background_over_image"></div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="slide-inner jl_radus_e"><img
                                                src="img/andre-ouellet-lGUJOzDBTJk-unsplash-1000x650.jpg"
                                                alt="" />
                                            <div class="background_over_image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post_content_w">
                    <div class="post_sw">
                        <div class="post_s">
                            <div class="jl_single_share_wrapper jl_clear_at">
                                <ul class="single_post_share_icon_post">
                                    <li class="single_post_share_facebook"><a href="#"
                                            target="_blank"><i class="jli-facebook"></i></a>
                                    </li>
                                    <li class="single_post_share_twitter"><a href="#"
                                            target="_blank"><i class="jli-twitter"></i></a></li>
                                    <li class="single_post_share_pinterest"><a href="#"
                                            target="_blank"><i class="jli-pinterest"></i></a>
                                    </li>
                                    <li class="single_post_share_linkedin"><a href="#"
                                            target="_blank"><i class="jli-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div><span class="single-post-meta-wrapper jl_sfoot"><a href="#"
                                    class="jm-post-like" data-post_id="2961" title="Like"><i
                                        class="jli-love"></i><span>1</span></a><span
                                    class="view_options"><i
                                        class="jli-view-o"></i><span>3.6k</span></span></span>
                        </div>
                    </div>
                    <div class="post_content jl_content">
                        {!! $detail->content !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="single_tag_share ">
                    <div class="tag-cat">
                        <ul class="single_post_tag_layout">
                            <li><a href="#" rel="tag">Relaxing</a></li>
                            <li><a href="#" rel="tag">shooting</a></li>
                        </ul>
                    </div>
                </div>
                
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Leave a Reply</h3>
                    <form action="https://jellywp.com/html/sprasa-preview/post-layout-1.html"
                        method="post" id="commentform" class="comment-form">
                        <p class="comment-notes"><span id="email-notes">Your email address will
                                not be published.</span> Required fields are marked <span
                                class="required">*</span></p>
                        <p class="comment-form-comment"><textarea class="u-full-width"
                                id="comment" name="comment" cols="45" rows="8"
                                aria-required="true" placeholder="Comment"></textarea></p>
                        <div class="form-fields row"><span
                                class="comment-form-author col-md-4"><input id="author"
                                    name="author" type="text" value="" size="30"
                                    placeholder="Fullname"></span><span
                                class="comment-form-email col-md-4"><input id="email"
                                    name="email" type="text" value="" size="30"
                                    placeholder="Email Address"></span><span
                                class="comment-form-url col-md-4"><input id="url" name="url"
                                    type="text" value="" size="30" placeholder="Web URL"></span>
                        </div>
                        <p class="comment-form-cookies-consent"><input
                                id="wp-comment-cookies-consent"
                                name="wp-comment-cookies-consent" type="checkbox"
                                value="yes"><label for="wp-comment-cookies-consent">Save my
                                name, email, and website in this browser for the next time I
                                comment.</label></p>
                        <p class="form-submit"><input name="submit" type="submit" id="submit"
                                class="submit" value="Post Comment"><input type="hidden"
                                name="comment_post_ID" id="comment_post_ID"></p>
                    </form>
                </div><!-- #respond -->
            </div>
        </div><!-- end post -->
        <div class="brack_space"></div>
    </div>
</div>
@endsection
