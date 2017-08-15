@extends('layouts.index')
@section ('meta')
    <title>123</title>
    <meta type="keywords" content="123">
@endsection
@section('styles')
    <style>
        .tm-posts_item_head_wrap h6 a:hover {
            color: #fff;
        }
        .tm-posts_item_head_wrap {
            list-style-type: none;
        }
        .tm-posts_item_head_wrap #tm_builder_outer_content .tm_pb_module ul:not([class]) > li::before {
            display: none;
        }
        .maker__wrapper li::before {
            display: none !important;
        }
    </style>
    
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
                                        <div class="tm_pb_container clearfix" style="min-height: 1032px; position: relative;">

                                            <div class="tm_pb_slide_description">
                                                <div class="tm_pb_slide_description_inner">
                                                    <h2 class="tm_pb_slide_title">{!! $item->title !!}</h2>
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
                <div class="header-container transparent invert">
                    <div class="header-container_wrap container">
                        <div class="header-container__flex">
                            <div class="site-branding">
                                <div class="site-logo site-logo--image"><a class="site-logo__link" href="/" rel="home"><img src="https://ld-wp.template-help.com/wordpress_61152/wp-content/themes/contractor/assets/images/invert-logo.png" alt="Contractor" class="site-link__img"></a></div>					</div>

                            @include('modules.nav')
                            <div class="header-icons divider">
                            </div>

                        </div>
                    </div>
                </div><!-- .header-container -->
                <div class="tm_pb_section  tm_pb_section_1 tm_section_regular tm_section_transparent" style="padding: 50px 0; ">
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
                                    <div class="row tm_pb_row tm_pb_row_3 tm_pb_row_fullwidth">
                                        <div class="tm_pb_module" style="width: 100%;">
                                            <button class="tm_pb_button modal__usluga" style="margin: 30px auto 0; display: block; ">Заказать услугу</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- .tm_pb_cherry_services -->
                        </div>
                        <!-- .tm_pb_column -->
                    </div>
                    <!-- .tm_pb_row -->
                </div>
                <div class="tm_pb_section  tm_pb_section_4 tm_section_regular tm_section_transparent" style="padding-top: 30px;padding-bottom: 0px;">
                    <div class="container">
                        <div class=" row tm_pb_row tm_pb_row_4">
                            <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_5 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                                <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_center  tm_pb_text_1">
                                    <h4>Наша продукция</h4>
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
                                            @foreach($category as $item)
                                                <div class="tm_pb_column col-xl-6 col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 30px;">
                                                    <div class="tm-posts_item">
                                                        <div class="tm-posts_item_head_wrap" style="background-color: #f9b707; padding: 5px 20px;">
                                                            <h6 class="tm-posts_item_title" style=" margin-top: 0px; color: #fff;font-size: 22px;"><a href="{{route('product.category',['category' => $item->alias])}}" title="{{$item->title}}" rel="bookmark">{{$item->title}}</a></h6>
                                                        </div>
                                                        <div class="tm-posts_item_content_wrap">
                                                            <a href="{{route('product.category',['category' => $item->alias])}}" class="tm-posts_img"><img src="{{$item->img}}" alt="{{$item->title}}" style="width: 50%;float: left; vertical-align: top; margin-top: 15px;"></a>
                                                            <div class="maker__wrapper" style="display: inline-block;width: 50%;">
                                                                <ul style="list-style-type: none;">


                                                                @foreach($item->maker as $value)
                                                                    <li style="padding-left: 10px;padding-bottom: 10px;display: inline-block;  list-style-type: none;">
                                                                        <a href="{{route('product.maker', ['category' => $item->alias, 'maker' => $value->alias])}}" style="color: #000;">{{$value->name}}</a>
                                                                    </li>

                                                                @endforeach
                                                                </ul>
                                                                <div class="price__wrapper">
                                                                    <p>Цена от {{$item->min_price}} руб  </p>
                                                                    <div class="montage__wrap">
                                                                        @if($item->montage)
                                                                            <div class="montage__item montage__item_montage">Монтаж</div>
                                                                        @endif
                                                                        @if($item->leaves)
                                                                            <div class="montage__item montage__item_leaves">Доставка</div>
                                                                        @endif
                                                                        @if($item->garant)
                                                                            <div class="montage__item montage__item_garant">Гарантии</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="posts_item_content_footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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

                @include('modules.reviews', ['rev' => $rev])
                <!-- .tm_pb_section -->
            </div>
            @include('modules.contacts')
        </div>
    </div>
    <!-- .entry-content -->
    <footer class="entry-footer">
    </footer>
    <!-- .entry-footer -->
@endsection
@section('script')
    <style>
        .site-content .site-logo.site-logo--image {
            display: none;
        }
        .site-header.style-4.transparent .main-navigation .menu {
            visibility: hidden;
        }
        #tm_builder_outer_content .tm_pb_slider .tm_pb_container {
            padding: 0;
        }
        #tm_builder_outer_content .tm_pb_slider.tm_pb_module .tm_pb_slide_description, #tm_builder_outer_content .tm_pb_slider .tm_pb_slide_description {
            padding: 0;
            padding-top: 13%;
        }
        #tm_builder_outer_content .tm_pb_slider.invert .tm_pb_slide_description .tm_pb_slide_title, #tm_builder_outer_content .tm_pb_slider.invert .tm_pb_slide_description .tm_pb_slide_content {
            text-align: left;
        }
        #tm_builder_outer_content .tm_pb_slider.tm_pb_module .tm_pb_slide_description .tm_pb_slide_title, #tm_builder_outer_content .tm_pb_slider .tm_pb_slide_description .tm_pb_slide_title {
            font-size: 3.5em;
        }
        .tm_pb_slide_description_inner {
            text-align: left;
        }
        #tm_builder_outer_content .tm_pb_slide_description h2 {
            padding: 20px 25px;
            display: inline-block;
            background-color: rgba(0, 0, 0, 0.4);
            font-weight: 500 !important;
        }
    </style>
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