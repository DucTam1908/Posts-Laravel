@extends('client.layouts.master')

@section('banner')
    <h2 class="text-center my-3 ">Đây là các tin tức của danh mục: {{ $category->name }}</h2>
@endsection

@section('content')
    <div class="col-md-8 grid-sidebar" id="content">
        <div class="jl_cat_mid_title">
            <h3 class="categories-title title">Active</h3>
            <p>Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni.
                Pede vidi condimentum et aenean hendrerit. Quis sem justo nisi varius tincidunt nec
                aliquam arcu tempus vel laoreet lorem.</p>
        </div>
        <div class="jl_wrapper_cat">
            <div id="content_masonry" class="jl_cgrid pagination_infinite_style_cat load_more_main_wrapper">
                @foreach ($posts as $item)
                    @php
                        $date_one = $item->created_at;
                        $date_day = date('d', strtotime($date_one));
                        $date_M = date('m', strtotime($date_one));
                        $date_Y = date('Y', strtotime($date_one));
                        $date = 'Ngày' . ' ' . $date_day . ' ' . 'Tháng' . ' ' . $date_M . ' ' . 'Năm' . ' ' . $date_Y;
                    @endphp
                    <div
                        class="box jl_grid_layout1 blog_grid_post_style post-2955 post type-post status-publish format-quote has-post-thumbnail hentry category-active tag-morning tag-shooting post_format-post-format-quote">
                        <div class="jl_grid_w">
                            <div class="jl_img_box jl_radus_e"> <a href="{{ route('detail', $item->id) }}"> <span
                                        class="jl_post_type_icon"><i class="jli-quote-2"></i></span>
                                    <img width="500" height="350" src="{{ asset($item->image) }}"
                                        class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image"
                                        alt="" loading="lazy" /> </a> <span class="jl_f_cat"><a
                                        class="post-category-color-text" style="background:#4dcf8f"
                                        href="#">{{ $item->cate }}</a></span> </div>
                            <div class="text-box">
                                <h3><a href="{{ route('detail', $item->id) }}" tabindex="-1">{{ $item->title }}</a></h3>
                                <span class="jl_post_meta"><span class="jl_author_img_w"><i class="jli-user"></i><a
                                            href="#" title="Posts by Spraya"
                                            rel="author">{{ $item->name }}</a></span><span class="post-date"><i
                                            class="jli-pen"></i>{{ $date }}</span>
                                    <p>{{ $item->short_description }}
                                    </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <nav class="jellywp_pagination">
                <ul class="page-numbers">
                    <li><span aria-current="page" class="page-numbers current">1</span> </li>
                    <li><a class="page-numbers" href="#">2</a> </li>
                    <li><a class="page-numbers" href="#">3</a> </li>
                    <li><span class="page-numbers dots">…</span> </li>
                    <li><a class="page-numbers" href="#">7</a> </li>
                    <li><a class="next page-numbers" href="#"><i class="jli-right-chevron"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
