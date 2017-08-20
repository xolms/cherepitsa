@extends('layouts.second')
@section('meta')
    <title>{{$usluga->title}}</title>
    <meta type="description" content="{{$usluga->description}}">
@endsection
@section('body')
    post-template-default single single-post postid-31 single-format-standard single-post-default header-layout-fullwidth content-layout-fullwidth footer-layout-fullwidth blog-default position-fullwidth sidebar-1-3 header-style-4 footer-default tm_pb_builder
@endsection
@section('content')
    <div class="site-content_wrap container">
        <div class="row">
            <div id="primary" class="col-xs-12 col-md-12 col-xl-8 col-xl-push-2">
                <main id="main" class="site-main" role="main">
                    <article id="post-31" class="post-31 post type-post status-publish format-standard has-post-thumbnail hentry category-industry-news tag-industry-news has-thumb">
                        <header class="entry-header">
                            <h3 class="entry-title">{{$usluga->name}}</h3>
                        </header>
                        <!-- .entry-header -->
                        <figure class="post-thumbnail">

                            <img class="post-thumbnail__img wp-post-image" src="{{$usluga->bg}}" alt="{{$usluga->name}}">
                        </figure>
                        <!-- .post-thumbnail -->
                        <div class="entry-content category__footer">
                            {!! $usluga->text !!}
                            <button class="tm_pb_button modal__click" style="display: block;margin-left: auto;margin-right: auto; max-width: 200px;margin-bottom: 30px;margin-top: 50px;" data-title="Заказать {{$usluga->name}}" data-textarea="Укажите дополнительную информацию: куда прибыть, во сколько и тд" data-theme="Заказ услуги {{$usluga->name}}" data-link="{{route('form.usluga')}}">Заказать</button>

                        </div>
                        <!-- .entry-content -->
                        <!-- .entry-footer -->
                    </article>
                    <!-- #post-## -->
                    <!-- #comments -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <div class="tm_pb_section  tm_pb_section_1 tm_section_regular tm_section_transparent">
            <div class=" row tm_pb_row tm_pb_row_1">
                <div class="tm_pb_column  tm_pb_column_1 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                    <div class="tm_pb_cherry_services tm_pb_cherry_services_0">
                        <div class="services-container">
                            <h3 class="services-heading_title">Другие наши услуги</h3>
                            <div class=" row tm_pb_row tm_pb_row_3 tm_pb_row_fullwidth">
                                <div class="tm_pb_column  col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                                    <div class="tm_pb_cherry_projects_terms tm_pb_cherry_projects_terms_0">
                                        <div class="cherry-projects-terms-wrapper">
                                            <div class="projects-terms-container cherry-animation-container grid-layout loading-animation-fade" data-settings="{&quot;list-layout&quot;:&quot;grid-layout&quot;,&quot;post-per-page&quot;:&quot;8&quot;,&quot;column-number&quot;:&quot;{{$width}}&quot;,&quot;item-margin&quot;:&quot;0&quot;}" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="projects-terms-list cherry-animation-list">
                                                    @include('elements.usluga', [$usluga = $random, $width])
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
        <!-- .row -->
    </div>
@endsection
@section('script')

@endsection