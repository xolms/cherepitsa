@extends('layouts.second')
@section('meta')
    @if(isset($usluga))
        <title>{{$usluga->name}} примеры работ</title>
    @else
        <title>Наши работы</title>
    @endif
    @if(isset($usluga))
        <meta type="description" content="{{$usluga->name}} примеры работ {{$_SERVER['SERVER_NAME']}}">
    @else
        <meta type="description" content="Работы такой то компании">
    @endif

@endsection
@section('content')
    <div id="content" class="site-content">
        <div class="site-content_wrap container">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-12">
                    <main id="main" class="site-main" role="main">
                        <header>
                            @if(isset($usluga))
                                <h1 class="page-title" style="font-size: 24px;">{{$usluga->name}} примеры наших работ</h1>
                            @else
                                <h1 class="page-title" >Наши работы</h1>
                            @endif

                        </header>
                        <div class="posts-list posts-list--grid-3-cols content-excerpt fullwidth card-deck no-sidebars-before">
                            @foreach($works as $work)
                                <article class="posts-list__item card post-171 post type-post status-publish format-standard has-post-thumbnail hentry category-completed-projects tag-projects-in-development has-thumb">


                                    <div class="post-list__item-content">
                                        <figure class="post-thumbnail">
                                            <a href="{{route('work.alias',['category' => $work->usluga->alias , 'alias' => $work->alias])}}" class="post-thumbnail__link post-thumbnail--fullwidth" style=" margin-bottom: 5px;"><img class="post-thumbnail__img wp-post-image" src="{{$work->img}}" alt="{{$work->title}}" ></a>		</figure><!-- .post-thumbnail -->

                                        <header class="entry-header">
                                            {{$work->usluga->alias}}
                                            <h5 class="entry-title"><a href="{{route('work.alias',['category' => $work->usluga->alias , 'alias' => $work->alias])}}" rel="bookmark">{{$work->title}}</a></h5>		</header><!-- .entry-header -->






                                        <div class="entry-content">
                                            {!! $work->short_text !!}
                                        </div><!-- .entry-content -->
                                    </div><!-- .post-list__item-content -->

                                    <footer class="entry-footer">

                                    </footer><!-- .entry-footer -->

                                </article>
                            @endforeach
                        <!-- #post-## -->

                        </div>
                        <!-- .posts-list -->
                        {{$works->links('paginate.paginate')}}
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