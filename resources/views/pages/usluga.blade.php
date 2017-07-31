@extends('layouts.second')
@section('meta')
    <title>{{$usluga->title}}</title>
    <meta type="description" content="{{$usluga->content}}">
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
                        <div class="entry-content">
                            {!! $usluga->text !!}
                        </div>
                        <!-- .entry-content -->
                        <footer class="entry-footer">
                            <div class="share-btns__list ">
                                <div class="share-btns__item facebook-item"><a class="share-btns__link" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdomincrimea.ru%2F2016%2F07%2F12%2Fhow-to-save-10-grand-a-year-with-digital-blueprints%2F&amp;t=How+to+save+10+grand+a+year+with+digital+blueprints" target="_blank" rel="nofollow" title="Share on Facebook"><i class="fa fa-facebook"></i><span class="share-btns__label screen-reader-text">Facebook</span></a></div>
                                <div class="share-btns__item twitter-item"><a class="share-btns__link" href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fdomincrimea.ru%2F2016%2F07%2F12%2Fhow-to-save-10-grand-a-year-with-digital-blueprints%2F&amp;text=How+to+save+10+grand+a+year+with+digital+blueprints" target="_blank" rel="nofollow" title="Share on Twitter"><i class="fa fa-twitter"></i><span class="share-btns__label screen-reader-text">Twitter</span></a></div>
                                <div class="share-btns__item google-plus-item"><a class="share-btns__link" href="https://plus.google.com/share?url=http%3A%2F%2Fdomincrimea.ru%2F2016%2F07%2F12%2Fhow-to-save-10-grand-a-year-with-digital-blueprints%2F" target="_blank" rel="nofollow" title="Share on Google+"><i class="fa fa-google-plus"></i><span class="share-btns__label screen-reader-text">Google+</span></a></div>
                                <div class="share-btns__item linkedin-item"><a class="share-btns__link" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fdomincrimea.ru%2F2016%2F07%2F12%2Fhow-to-save-10-grand-a-year-with-digital-blueprints%2F&amp;title=How+to+save+10+grand+a+year+with+digital+blueprints&amp;summary=Ask+any+construction+business+professional+or+an+architect+if+they+suffer+from+tantrums+when+penning+their+contract+drawings%2C+and+you+are+more+than+likely+to+hear+an+enthusiastically+frustrated%2C+%E2%80%9CYES%21%E2%80%9D&amp;source=http%3A%2F%2Fdomincrimea.ru%2F2016%2F07%2F12%2Fhow-to-save-10-grand-a-year-with-digital-blueprints%2F" target="_blank" rel="nofollow" title="Share on LinkedIn"><i class="fa fa-linkedin"></i><span class="share-btns__label screen-reader-text">LinkedIn</span></a></div>
                                <div class="share-btns__item pinterest-item"><a class="share-btns__link" href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fdomincrimea.ru%2F2016%2F07%2F12%2Fhow-to-save-10-grand-a-year-with-digital-blueprints%2F&amp;description=How+to+save+10+grand+a+year+with+digital+blueprints&amp;media=http%3A%2F%2Fdomincrimea.ru%2Fwp-content%2Fuploads%2F2016%2F10%2Fblog-11.jpg" target="_blank" rel="nofollow" title="Share on Pinterest"><i class="fa fa-pinterest"></i><span class="share-btns__label screen-reader-text">Pinterest</span></a></div>
                            </div>
                        </footer>
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