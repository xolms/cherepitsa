@extends('layouts.second')
@section('meta')
    <title>{{$work->title}}</title>
    <meta type="description" content="{{$work->description}}">
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
                            <h3 class="entry-title">{{$work->title}}</h3>
                        </header>
                        <!-- .entry-header -->
                        <figure class="post-thumbnail">

                            <img class="post-thumbnail__img wp-post-image" src="{{$work->img}}" alt="{{$work->title}}">
                        </figure>
                        <!-- .post-thumbnail -->
                        <div class="entry-content">
                            {!! $work->text !!}
                        </div>
                        <!-- .entry-content -->
                        <footer class="entry-footer">

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
        <!-- .row -->
    </div>
@endsection
@section('script')

@endsection