@extends('layouts.index')
@section ('meta')
    <title>123</title>
    <meta type="keywords" content="123">
@endsection
@section('content')
    <header class="entry-header">
        <h1 class="entry-title screen-reader-text">Главная</h1>
    </header>
    <!-- .entry-header -->
    <div class="entry-content">
        <div class="tm_builder_outer_content" id="tm_builder_outer_content">
            <div class="tm_builder_inner_content tm_pb_gutters3">
                <div class="tm_pb_section height_screen tm_pb_section_0 tm_section_regular tm_section_transparent">
                    <div class=" row tm_pb_row tm_pb_row_0 tm_pb_row_fullwidth">
                        <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_0 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                            <div class="tm_pb_slider invert tm_pb_slider_0 tm_pb_slider_fullwidth_off     tm_pb_module tm_pb_bg_layout_light">
                                <div class="tm_pb_slides">
                                    @foreach($slider as $k => $item)
                                    <div class="tm_pb_slide tm_pb_bg_layout_light tm_pb_media_alignment_center tm_pb_slide_{{$k}} tm-pb-active-slide" style="background-color:#ffffff;background-image:url({{$item->bg}});">
                                        <div class="tm_pb_container clearfix" style="min-height: 1032px;">
                                            <div class="tm_pb_slide_description">
                                                <div class="tm_pb_slide_description_inner">
                                                    <h2 class="tm_pb_slide_title">{{$item->title}}</h2>
                                                    <div class="tm_pb_slide_content">{{$item->text}}</div>
                                                    @if(!empty($item->alias) )
                                                        <a href="{{$item->alias}}" class="tm_pb_more_button tm_btn_1 tm_pb_button">{{isset($item->button_name) ? $item->button_name : 'Подробнее'}}</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- .tm_pb_slide_description -->
                                        </div>
                                        <!-- .tm_pb_container -->
                                    </div>
                                    <!-- .tm_pb_slide -->
                                    @endforeach
                                </div>
                                <!-- .tm_pb_slides -->

                            </div>
                            <!-- .tm_pb_slider -->
                        </div>
                        <!-- .tm_pb_column -->
                    </div>
                    <!-- .tm_pb_row -->
                </div>
                <!-- .tm_pb_section -->
                <div class="tm_pb_section  tm_pb_section_1 tm_section_regular tm_section_transparent">
                    <div class=" row tm_pb_row tm_pb_row_1">
                        <div class="tm_pb_column  tm_pb_column_1 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                            <div class="tm_pb_cherry_services tm_pb_cherry_services_0">
                                <div class="services-container">
                                    <h3 class="services-heading_title">Наши услуги</h3>
                                    <div class=" row tm_pb_row tm_pb_row_3 tm_pb_row_fullwidth">
                                        <div class="tm_pb_column  col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                                            <div class="tm_pb_cherry_projects_terms tm_pb_cherry_projects_terms_0">
                                                <div class="cherry-projects-terms-wrapper">
                                                    <div class="projects-terms-container cherry-animation-container grid-layout loading-animation-fade" data-settings="{&quot;list-layout&quot;:&quot;grid-layout&quot;,&quot;post-per-page&quot;:&quot;8&quot;,&quot;column-number&quot;:&quot;{{$width}}&quot;,&quot;item-margin&quot;:&quot;0&quot;}" style="margin-left: 0px; margin-right: 0px;">
                                                        <div class="projects-terms-list cherry-animation-list">
                                                            @include('elements.usluga', [$usluga, $width])
                                                        </div>
                                                    </div>
                                                    <div class="cherry-projects-ajax-loader" style="display: none; opacity: 0;">
                                                        <div class="cherry-spinner cherry-spinner-double-bounce">
                                                            <div class="cherry-double-bounce1"></div>
                                                            <div class="cherry-double-bounce2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .tm_pb_cherry_projects_terms -->
                                        </div>
                                        <!-- .tm_pb_column -->
                                    </div>
                                </div>
                            </div>
                            <!-- .tm_pb_cherry_services -->
                        </div>
                        <!-- .tm_pb_column -->
                    </div>
                    <!-- .tm_pb_row -->
                </div>
                <!-- .tm_pb_section -->
                <div class="tm_pb_section  tm_pb_section_2 tm_pb_with_background tm_section_regular">
                    <div class="container">
                        <div class=" row tm_pb_row tm_pb_row_2">
                            <div class="tm_pb_column tm_pb_column_1_2  tm_pb_column_2 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm_pb_vertical_alligment_start">
                                <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_left  tm_pb_text_0">
                                    <h4>{{$about->title}}</h4>
                                    {!! $about->shorttext !!}
                                </div>
                                <!-- .tm_pb_text -->
                                <div class="tm_pb_button_module_wrapper tm_pb_module">
                                    <a class="tm_pb_button tm_pb_custom_button_icon  tm_pb_button_0 tm_pb_module tm_pb_bg_layout_light tm_pb_icon_right" href="{{route('about.index')}}" data-icon="">Подробнее о нас</a>
                                </div>
                            </div>
                            <!-- .tm_pb_column -->
                            <div class="tm_pb_column tm_pb_column_1_2  tm_pb_column_3 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm_pb_vertical_alligment_start">
                                <div class="tm_pb_module tm-waypoint tm_pb_image tm_pb_animation_right tm_pb_image_0 tm_always_center_on_mobile">
                                    <img src="{{$about->img}}" alt="{{$about->title}}">
                                </div>
                            </div>
                            <!-- .tm_pb_column -->
                        </div>
                        <!-- .tm_pb_row -->
                    </div>
                </div>

                <div class="tm_pb_section  tm_pb_section_4 tm_section_regular tm_section_transparent">
                    <div class="container">
                        <div class=" row tm_pb_row tm_pb_row_4">
                            <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_5 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                                <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_center  tm_pb_text_1">
                                    <h4>Recent News</h4>
                                </div>
                                <!-- .tm_pb_text -->
                            </div>
                            <!-- .tm_pb_column -->
                        </div>
                        <!-- .tm_pb_row -->
                    </div>
                    <div class="container">
                        <div class=" row tm_pb_row tm_pb_row_5">
                            <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_6 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                                <div class="tm_pb_posts tm_pb_posts_0 tm_pb_module">
                                    <div class="tm-posts_title_group">
                                    </div>
                                    <div class="tm-posts_listing">
                                        <div class="row tm-posts_layout-1">
                                            <div class="tm_pb_column col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class="tm-posts_item">
                                                    <div class="tm-posts_item_content_wrap">
                                                        <a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/19/future-proofing-hospitals/" class="tm-posts_img"><img src="https://ld-wp.template-help.com/wordpress_61152/wp-content/uploads/2016/10/blog-27-418x315.jpg" alt="Future proofing hospitals"></a>
                                                        <h5 class="tm-posts_item_title"><a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/19/future-proofing-hospitals/" title="Future proofing hospitals" rel="bookmark">Future proofing hospitals</a></h5>
                                                        <div class="tm-posts_item_meta entry-meta"><a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/19/" class="post-date"><time datetime="2016-10-19T06:58:06+00:00" title="2016-10-19T06:58:06+00:00">October 19, 2016</time></a><span class="posted-by">by <a href="https://ld-wp.template-help.com/wordpress_61152/author/admin/" class="post-author" rel="author">admin</a></span></div>
                                                        <div class="tm-posts_item_excerpt">By improving the physical layout of hospitals and medical facilities, we can enhance and increase safety mechanisms, improve care, and…</div>
                                                    </div>
                                                    <div class="posts_item_content_footer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tm_pb_column col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class="tm-posts_item">
                                                    <div class="tm-posts_item_content_wrap">
                                                        <a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/13/bike-parts-warehouse-de/" class="tm-posts_img"><img src="https://ld-wp.template-help.com/wordpress_61152/wp-content/uploads/2016/10/blog-26-418x315.jpg" alt="Bike parts warehouse, DE"></a>
                                                        <h5 class="tm-posts_item_title"><a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/13/bike-parts-warehouse-de/" title="Bike parts warehouse, DE" rel="bookmark">Bike parts warehouse, DE</a></h5>
                                                        <div class="tm-posts_item_meta entry-meta"><a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/13/" class="post-date"><time datetime="2016-10-13T06:55:38+00:00" title="2016-10-13T06:55:38+00:00">October 13, 2016</time></a><span class="posted-by">by <a href="https://ld-wp.template-help.com/wordpress_61152/author/admin/" class="post-author" rel="author">admin</a></span></div>
                                                        <div class="tm-posts_item_excerpt">Delaware proved to be a very friendly place to work at… While invited there for completing a mid-sized warehouse for…</div>
                                                    </div>
                                                    <div class="posts_item_content_footer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tm_pb_column col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class="tm-posts_item">
                                                    <div class="tm-posts_item_content_wrap">
                                                        <a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/13/joy-hotel-casino/" class="tm-posts_img"><img src="https://ld-wp.template-help.com/wordpress_61152/wp-content/uploads/2016/10/blog-28-418x315.jpg" alt="Joy Hotel &amp; Casino"></a>
                                                        <h5 class="tm-posts_item_title"><a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/13/joy-hotel-casino/" title="Joy Hotel &amp; Casino" rel="bookmark">Joy Hotel &amp; Casino</a></h5>
                                                        <div class="tm-posts_item_meta entry-meta"><a href="https://ld-wp.template-help.com/wordpress_61152/2016/10/13/" class="post-date"><time datetime="2016-10-13T06:53:17+00:00" title="2016-10-13T06:53:17+00:00">October 13, 2016</time></a><span class="posted-by">by <a href="https://ld-wp.template-help.com/wordpress_61152/author/admin/" class="post-author" rel="author">admin</a></span></div>
                                                        <div class="tm-posts_item_excerpt">This hotel &amp; casino complex is our most recent completed building… The whole structure that took us 6 months to…</div>
                                                    </div>
                                                    <div class="posts_item_content_footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tm-posts_button_wrap">
                                        <a href="https://ld-wp.template-help.com/wordpress_61152/blog/" class=" btn btn-primary tm_pb_button" data-icon="">See all news</a>
                                    </div>
                                </div>
                                <!-- .tm_pb_posts -->
                            </div>
                            <!-- .tm_pb_column -->
                        </div>
                        <!-- .tm_pb_row -->
                    </div>
                </div>
                <!-- .tm_pb_section -->
            </div>
        </div>
    </div>
    <!-- .entry-content -->
    <footer class="entry-footer">
    </footer>
    <!-- .entry-footer -->
@endsection
@section('script')
    <script type="text/javascript">
        /* <![CDATA[ */
        var wp_load_style = ["cherry-testi.css","jquery-swiper.css","cherry-services.css","cherry-services-theme.css","cherry-services-grid.css","font-awesome.css","dashicons.css","magnific-popup.css","cherry-projects-styles.css","cherry-google-fonts.css","linearicons.css","tm-builder-swiper.css","tm-builder-modules-style.css","cherry-team.css","cherry-team-grid.css","contractor-theme-style.css"];
        var wp_load_script = ["cherry-js-core.js","tm-builder-modules-global-functions-script.js","jquery-swiper.js","magnific-popup.js","cherry-projects-single-scripts.js","cherry-post-formats.js","google-maps-api.js","divi-fitvids.js","waypoints.js","tm-jquery-touch-mobile.js","tm-builder-frontend-closest-descendent.js","tm-builder-frontend-reverse.js","tm-builder-frontend-simple-carousel.js","tm-builder-frontend-simple-slider.js","tm-builder-frontend-easy-pie-chart.js","tm-builder-frontend-tm-hash.js","tm-builder-modules-script.js","tm-builder-swiper.js","fittext.js","contractor-theme-script.js"];
        var cherry_ajax = "5cd570da3f";
        var ui_init_object = {"auto_init":"false","targets":[]};
        /* ]]> */

        function CherryCSSCollector(){"use strict";var t,e=window.CherryCollectedCSS;void 0!==e&&(t=document.createElement("style"),t.setAttribute("title",e.title),t.setAttribute("type",e.type),t.textContent=e.css,document.head.appendChild(t))}CherryCSSCollector();


        var contractor = {"ajaxurl":"http:\/\/domincrimea.ru\/wp-admin\/admin-ajax.php","labels":{"totop_button":"","header_layout":"style-4"},"more_button_options":{"more_button_type":"text","more_button_text":"More","more_button_icon":"fa-arrow-down","more_button_image_url":"","retina_more_button_image_url":null},"toTop":"1"};
        /* <![CDATA[ */
        var tm_pb_custom = {"ajaxurl":"http:\/\/domincrimea.ru\/wp-admin\/admin-ajax.php","images_uri":"http:\/\/domincrimea.ru\/wp-content\/themes\/contractor\/images","builder_images_uri":"http:\/\/domincrimea.ru\/wp-content\/plugins\/power-builder\/framework\/assets\/images","tm_frontend_nonce":"d68f954876","subscription_failed":"Please, check the fields below to make sure you entered the correct information.","fill_message":"Please, fill in the following fields:","contact_error_message":"Please, fix the following errors:","invalid":"Invalid email","captcha":"Captcha","prev":"Prev","previous":"Previous","next":"Next","wrong_captcha":"You entered the wrong number in captcha.","is_builder_plugin_used":"1","is_divi_theme_used":"","widget_search_selector":".widget_search"};
        /* ]]> */
    </script>
@endsection