@extends('layouts.second')
@section('meta')
    <title>Наша продукция</title>
    <meta type="description" content="Вся наша продукция">
@endsection
@section('body')
    page-template-default  tm_pb_builder single-post single page page-id-253 use-tm-pb-builder header-layout-fullwidth content-layout-fullwidth footer-layout-fullwidth blog-default position-fullwidth sidebar-1-3 header-style-4 footer-default tm_pb_builder
@endsection
@section('content')
    <div class="tm_pb_section  tm_pb_section_4 tm_section_regular tm_section_transparent" style="padding-top: 30px;padding-bottom: 0px;">
        <div class="container">
            <div class=" row tm_pb_row tm_pb_row_4">
                <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_5 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                    <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_center  tm_pb_text_1">
                        <h1 style="text-align: center;margin-bottom: 30px;">Наша продукция</h1>
                    </div>
                    <!-- .tm_pb_text -->
                </div>
                <!-- .tm_pb_column -->
            </div>
            <!-- .tm_pb_row -->
        </div>
            <div class=" row tm_pb_row tm_pb_row_5">
                <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_6 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                    <div class="tm_pb_posts tm_pb_posts_0 tm_pb_module">
                        <div class="tm-posts_title_group">
                        </div>
                        <div class="tm-posts_listing">
                            <div class="row tm-posts_layout-1" style="padding: 0 20px;">
                                @foreach($category as $item)
                                    <?php
                                    foreach ($item->makers->category as $row) {
                                        $cat = $row;
                                    }
                                    ?>
                                    <div class="tm_pb_column col-xl-4 col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 30px;">
                                        <div class="tm-posts_item">
                                            <div class="tm-posts_item_head_wrap" style="background-color: #f9b707; padding: 5px 20px;">
                                                <h6 class="tm-posts_item_title" style=" margin-top: 0px; color: #fff;font-size: 22px;"><a href="{{route('product.product', ['category' => $cat->alias, 'maker' => $item->makers->alias, 'product' => $item->alias])}}" title="{{$item->name}}" rel="bookmark">{{$item->name}}</a></h6>
                                            </div>
                                            <div class="tm-posts_item_content_wrap">

                                                <a href="{{route('product.product', ['category' => $cat->alias, 'maker' => $item->makers->alias, 'product' => $item->alias])}}" class="tm-posts_img"><img src="{{$item->img}}" alt="{{$item->name}}" style="width: 50%;float: left; vertical-align: top; margin-top: 15px;"></a>
                                                <div class="maker__wrapper" style="display: inline-block;width: 50%;">
                                                    <div class="category__wrapper">
                                                        <div class="category__item">
                                                            <p>Цена: {{$item->price}} руб</p>
                                                            @if(isset($item->color))
                                                                <p>Цвет: {{$item->color}}</p>
                                                            @endif
                                                            @if(isset($item->picture))
                                                                <p>Рисунок: {{$item->picture}}</p>
                                                            @endif
                                                            @if(isset($item->type))
                                                                <p>Тип: {{$item->type}}</p>
                                                            @endif
                                                            @if(isset($item->weight))
                                                                <p>Вес: {{$item->weight}}</p>
                                                            @endif
                                                            <p>Производитель: <a href="{{route('product.maker', ['category' => $cat->alias, 'maker' => $item->makers->alias])}}">{{$item->makers->name}}</a></p>
                                                            <p>Категория: <a href="{{route('product.category', ['category' => $cat->alias])}}">{{$cat->name}}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="category__footer">
                                                        <button class="tm_pb_button modal__buy" id="buy_{{$item->id}}">Заказать</button>
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
        <div class="container">
            {{$category->links('paginate.paginate')}}
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