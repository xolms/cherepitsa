@extends('layouts.second')
@section('meta')
    <title>Наши акции</title>
    <meta type="description" content="Акции такой то компании">
@endsection
@section('content')
    <div id="content" class="site-content">
        <div class="site-content_wrap container">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-12">
                    <main id="main" class="site-main" role="main">
                        <header>
                            <h1 class="page-title">Акции</h1>
                        </header>
                        <div class="posts-list posts-list--grid-3-cols content-excerpt fullwidth card-deck no-sidebars-before">
                            @foreach($events as $event)
                                <article class="posts-list__item card post-172 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-industry-news tag-industry-news has-thumb">
                                    <div class="post-list__item-content">
                                        <figure class="post-thumbnail">
                                            <img class="post-thumbnail__img wp-post-image" src="{{$event->img}}" alt="{{$event->title}}">
                                        </figure>
                                        <!-- .post-thumbnail -->
                                        <header class="entry-header">
                                            <h5 class="entry-title">{{$event->title}}</h5>
                                        </header>
                                        <!-- .entry-header -->
                                        <div class="entry-meta">
                                            <span class="post__date">Дата окончания акции
                                                <?php
                                                    $time =  New DateTime($event->date_end);
                                                ?>
                                                <time datetime="{{$time->format('d.m.Y')}}">{{$time->format('d.m.Y')}}</time>
                                            </span>
                                        </div>
                                        <!-- .entry-meta -->
                                        <div class="entry-content">
                                            <p>{!! $event->text !!}</p>
                                        </div>
                                        <!-- .entry-content -->
                                    </div>
                                    <!-- .post-list__item-content -->
                                    <footer class="entry-footer">
                                    </footer>
                                    <!-- .entry-footer -->
                                </article>
                            @endforeach
                            <!-- #post-## -->

                        </div>
                        <!-- .posts-list -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>


@endsection