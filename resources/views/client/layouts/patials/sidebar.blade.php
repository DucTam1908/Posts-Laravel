<div class="col-md-4" id="sidebar">
    <div class="jl_sidebar_w">
        <div id="sprasa_widget_social_counter_c-2" class="widget jl-widget-social-counter">
            <div class="widget-title">
                <h2 class="jl_title_c">Stay Connected</h2>
            </div>
            <div class="jl_social_counter social_counter_wraper jl_count_style_2 social_counter_item>">
                <div class="jlsocial-element jl-facebook jl_radus_e"><a target="_blank" href="https://facebook.com/envato"
                        class="facebook" title="facebook"></a> <span class="jlsocial-element-left"> <i
                            class="jli-facebook" aria-hidden="true"></i> <span class="num-count">228.8k</span></span>
                    <span class="jlsocial-element-right">fans</span></div>
                <div class="jlsocial-element jl-youtube jl_radus_e"><a target="_blank"
                        href="https://www.youtube.com/user/envato" title="Youtube"></a>
                    <span class="jlsocial-element-left"> <i class="jli-youtube" aria-hidden="true"></i> <span
                            class="num-count">65.5k</span></span> <span
                        class="jlsocial-element-right">subscribers</span>
                </div>
                <div class="jlsocial-element jl-vimeo jl_radus_e"><a target="_blank" href="https://vimeo.com/beeple"
                        title="vimeo"></a> <span class="jlsocial-element-left"> <i class="jli-vimeo"
                            aria-hidden="true"></i> <span class="num-count">240</span></span> <span
                        class="jlsocial-element-right">subscribers</span></div>
                <div class="jlsocial-element jl-pinterest jl_radus_e"><a target="_blank"
                        href="https://pinterest.com/envato" class="pinterest" title="pinterest"></a> <span
                        class="jlsocial-element-left"> <i class="jli-pinterest" aria-hidden="true"></i> <span
                            class="num-count">9.87k</span></span> <span class="jlsocial-element-right">followers</span>
                </div>
            </div>
        </div>
        <div id="sprasa_recent_post_text_widget-9" class="widget post_list_widget">
            <div class="widget_jl_wrapper">
                <div class="ettitle">
                    <div class="widget-title">
                        <h2 class="jl_title_c">CATEGORIES</h2>
                    </div>
                </div>
                <div class="bt_post_widget">
                    
                    <div class="list-group mb-3">
                        @foreach ($categories as $item)
                        <a href="{{route('showCate', $item->id)}}" class="list-group-item list-group-item-action">{{$item->name}}</a>
                        @endforeach
                        
                      </div>
                    
                </div>
            </div>
            <div class="widget_jl_wrapper">
                <div class="ettitle">
                    <div class="widget-title">
                        <h2 class="jl_title_c">HOT NEWS</h2>
                    </div>
                </div>
                <div class="bt_post_widget">
                    @foreach ($data_sidebar as $item)
                        @php
                            $date_one = $item->created_at;
                            $date_day = date('d', strtotime($date_one));
                            $date_M = date('m', strtotime($date_one));
                            $date_Y = date('Y', strtotime($date_one));
                            $date =
                                'Ngày' . ' ' . $date_day . ' ' . 'Tháng' . ' ' . $date_M . ' ' . 'Năm' . ' ' . $date_Y;
                        @endphp
                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                            <div class="jl_m_right_w">
                                <div class="jl_m_right_img jl_radus_e"><a href="#"><img width="120"
                                            height="120"
                                            src="{{ asset($item->image) }}"
                                            class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image"
                                            alt="" loading="lazy"></a></div>
                                <div class="jl_m_right_content">
                                    <h2 class="entry-title"> <a href="#" tabindex="-1">{{$item->title}}</a></h2><span class="jl_post_meta"><span
                                            class="jl_author_img_w"><i class="jli-user"></i><a href="#"
                                                title="Posts by Spraya" rel="author">{{$item->name}}</a></span><span
                                            class="post-date"><i class="jli-pen"></i>{{$date}}</span></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="sprasa_ads300x250_widget-2" class="widget jellywp_ads300x250_widget">
            <div class="widget_jl_wrapper ads_widget_container">
                <div class="widget-title">
                    <h2 class="jl_title_c">Advertisement</h2>
                </div>
                <div class="ads300x250-thumb jl_radus_e"><a href="#"><img
                            src="{{ asset('theme/client/img/ads.png') }}" alt=""></a></div>
            </div>
        </div>
    </div>
</div>
