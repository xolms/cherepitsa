@extends('layouts.second')
@section('meta')
    <title>{{$price->title}}</title>
    <meta type="description" content="{{$price->description}}">
@endsection
@section('body')
    post-template-default single single-post postid-34 single-format-image single-post-default header-layout-fullwidth content-layout-fullwidth footer-layout-fullwidth blog-default position-fullwidth sidebar-1-3 header-style-4 footer-default tm_pb_builder
@endsection
@section('content')


    <div id="content" class="site-content">
        <div class="site-content_wrap container" id="tm_builder_outer_content">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-12 col-xl-12 col-xl-push-0">
                    <main id="main" class="site-main" role="main">
                        <article id="post-34" class="post-34 post type-post status-publish format-image has-post-thumbnail hentry category-projects-in-development tag-industry-news post_format-post-format-image has-thumb">
                            <header class="entry-header">
                                <h3 class="entry-title">{{$price->name}}</h3>
                            </header>
                            <!-- .entry-header -->

                            <!-- .entry-meta -->
                            <div class="post-format-wrap clearfix " style="text-align: center;padding-bottom: 30px;">
                                <figure class="post-thumbnail "style="padding-right: 30px;display: inline-block;vertical-align: top;margin-top: 0;" >
                                    <img src="{{$price->img}}" class="post-thumbnail__img wp-post-image" alt="{{$price->name}}" style="max-width: 400px;width: 100%;height: auto;margin-left: 0;margin-right: 0;">
                                </figure>
                                <div class="price__wrap" style="display: inline-block;vertical-align: top;">
                                    <?php
                                    foreach ($price->makers->category as $row) {
                                        $cat = $row;
                                    }
                                    ?>
                                        <div class="tm_pb_pricing_content_top" style="padding-bottom: 0;">
                                            <span class="tm_pb_tm_price" style="padding-bottom: 0;"><span class="tm_pb_sum" style="color: #f9b707;">{{$price->price}}</span><span class="tm_pb_frequency" style="padding-left: 5px;"> руб</span></span>
                                        </div>
                                        <div class="tm_pb_pricing_content" style="padding-top: 10px;padding-left: 0;padding-right: 0;">
                                            <ul class="tm_pb_pricing">
                                                @if(isset($price->color))
                                                    <li style="padding: 0;"><span>Цвет: {{$price->color}}</span></li>
                                                @endif
                                                @if(isset($price->picture))
                                                    <li style="padding: 0;"><span>Рисунок: {{$price->picture}}</span></li>
                                                @endif
                                                @if(isset($price->type))
                                                    <li style="padding: 0;"><span>Тип: {{$price->type}}</span></li>
                                                @endif
                                                @if(isset($price->weight))
                                                    <li style="padding: 0;"><span>Вес: {{$price->weight}}</span></li>
                                                @endif
                                                <li style="padding: 0;"><span>Производитель: <a href="{{route('product.maker', ['category' => $cat->alias, 'maker' => $price->makers->alias])}}">{{$price->makers->name}}</a></span></li>
                                                <li style="padding: 0;"><span>Категория: <a href="{{route('product.category', ['category' => $cat->alias])}}">{{$cat->name}}</a></span></li>
                                            </ul>
                                        </div>
                                        <button class="tm_pb_button modal__click"   data-title="Заказать {{$price->name}}" data-textarea="Укажите дополнительную информацию" data-theme="Заказ товара {{$price->name}}" data-link="{{route('form.buy')}}">Заказать</button>

                                </div>
                            </div>
                            <!-- .post-thumbnail -->
                            <div class="entry-content">
                                {!! $price->text !!}
                            </div>
                            <!-- .entry-content -->
                            <footer class="entry-footer">

                            </footer>
                            <!-- .entry-footer -->
                        </article>
                        <!-- #post-## -->


                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>


    <div class="tm_pb_section  tm_pb_section_4 tm_section_regular tm_section_transparent" style="padding-top: 30px;padding-bottom: 0px;">
        <div class="container">
            <div class=" row tm_pb_row tm_pb_row_4">
                <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_5 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                    <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_center  tm_pb_text_1">
                        <h2 style="text-align: center;margin-bottom: 30px;font-size: 25px;">Другие товары</h2>
                    </div>
                    <!-- .tm_pb_text -->
                </div>
                <!-- .tm_pb_column -->
            </div>
            <!-- .tm_pb_row -->
        </div>
        <div class="container" style="max-width: 1500px;" id="tm_builder_outer_content">


            <div class=" row tm_pb_row tm_pb_row_0">
                <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_0 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                    <div class="tm_pb_module tm_pb_pricing clearfix tm_pb_pricing_4 tm_pb_pricing_tables_0 tm_pb_centered_pricing_items">
                        @foreach($other as $k => $item)
                            <?php
                            foreach ($item->makers->category as $row) {
                                $cat = $row;
                            }
                            ?>
                            <div class="tm_pb_pricing_table  tm_pb_pricing_table_1">
                                <div class="tm_pb_pricing_heading" style="padding-top: 10px;">
                                    <a href="{{route('product.product', ['category' => $cat->alias, 'maker' => $item->makers->alias, 'product' => $item->alias])}}">
                                        <img src="{{$item->img}}" alt="{{$item->name}}">
                                    </a>
                                    <h2 class="tm_pb_pricing_title">
                                        <a href="{{route('product.product', ['category' => $cat->alias, 'maker' => $item->makers->alias, 'product' => $item->alias])}}">{{$item->name}}</a>
                                    </h2>
                                </div>
                                <!-- .tm_pb_pricing_heading -->
                                <div class="tm_pb_pricing_content_top">
                                    <span class="tm_pb_tm_price"><span class="tm_pb_sum">{{$item->price}}</span><span class="tm_pb_frequency" style="padding-left: 5px;"> руб</span></span>
                                </div>
                                <!-- .tm_pb_pricing_content_top -->
                                <div class="tm_pb_pricing_content">
                                    <ul class="tm_pb_pricing">
                                        @if(isset($item->color))
                                            <li><span>Цвет: {{$item->color}}</span></li>
                                        @endif
                                        @if(isset($item->picture))
                                            <li><span>Рисунок: {{$item->picture}}</span></li>
                                        @endif
                                        @if(isset($item->type))
                                            <li><span>Тип: {{$item->type}}</span></li>
                                        @endif
                                        @if(isset($item->weight))
                                            <li><span>Вес: {{$item->weight}}</span></li>
                                        @endif
                                        <li><span>Производитель: <a href="{{route('product.maker', ['category' => $cat->alias, 'maker' => $item->makers->alias])}}">{{$item->makers->name}}</a></span></li>
                                        <li><span>Категория: <a href="{{route('product.category', ['category' => $cat->alias])}}">{{$cat->name}}</a></span></li>
                                    </ul>
                                </div>
                                <!-- .tm_pb_pricing_content -->
                                <button class="tm_pb_pricing_table_button tm_pb_button modal__click"   data-title="Заказать {{$item->name}}" data-textarea="Укажите дополнительную информацию" data-theme="Заказ товара {{$item->name}}" data-link="{{route('form.buy')}}">Заказать</button>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- .tm_pb_column -->
            </div>






        </div>


        <!-- .tm_pb_row -->

    </div>

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
@endsection