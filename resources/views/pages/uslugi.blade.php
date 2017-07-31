@extends('layouts.second')
@section('meta')
    <title>Список услуг</title>
    <meta type="description" content="Список услуг">
@endsection
@section('body')
    post-template-default single single-post postid-31 single-format-standard single-post-default header-layout-fullwidth content-layout-fullwidth footer-layout-fullwidth blog-default position-fullwidth sidebar-1-3 header-style-4 footer-default tm_pb_builder
@endsection
@section('content')
    <div class="tm_pb_section  tm_pb_section_1 tm_section_regular tm_section_transparent">
        <div class=" row tm_pb_row tm_pb_row_1">
            <div class="tm_pb_column  tm_pb_column_1 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                <div class="tm_pb_cherry_services tm_pb_cherry_services_0" style="padding: 50px 0;">
                    <div class="services-container">
                        <h1 class="services-heading_title">Наши услуги</h1>
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
@endsection
@section('script')

@endsection