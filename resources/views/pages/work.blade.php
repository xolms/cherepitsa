@extends('layouts.index')
@section('meta')
    <title>{{$work->title}}</title>
    <meta type="description" content="{{$work->description}}">
@endsection

@section('content')
    <div class="head-title">
        <div class="container">
            <div class="row">
                <h2 class="page-title">{{$work->name}}</h2>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end head-title -->

    <div id="main">
        <div class="container">
            <div class="row">

                <div class="content-area col-md-8" id="primary">

                    <div class="site-content" id="content">

                        <div class="post format-standard hentry">


                            <div class="entry-content">
                                <img src="{{$work->img}}" alt="{{$work->title}}" style="width: 100%;height: auto;padding-bottom: 25px;">
                                {!! $work->text !!}
                            </div>

                        </div><!-- end hentry -->
                    </div><!-- end site-content -->


                </div><!-- end site-content -->

                <aside id="secondary" class="col-md-4">
                    <div class="sidebar">



                        <div class="widget post-type-widget">
                            <h3 class="widget-title">Другие категории</h3>
                            <ul>
                                @foreach($usluga as $item)
                                    <li>

                                        <figure class="post-thumbnail">
                                            <a href="{{route('work.category', $item->alias)}}"><img src="{{$item->bg}}" alt="{{$item->name}}"></a>
                                        </figure>
                                        <h2 class="post-title">
                                            <a href="{{route('work.category', $item->alias)}}" style="font-size: 14px;">{{$item->name}}</a>
                                        </h2>
                                    </li>
                                @endforeach

                            </ul>
                        </div><!-- end widget -->

                        <div class="widget">
                            <h3 class="widget-title">Готовые работы</h3>
                            <div id="sidebar-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($items as $k => $item)
                                        <div class="item {{$k == 0 ? 'active' : ''}}">
                                            <img src="{{$item->img}}" alt="{{$item->name}}">
                                            <div class="carousel-caption">
                                                <div class="inner">
                                                    <h3><a href="{{route('work.alias', ['category' => $item->usluga->alias, 'alias' => $item->alias])}}">{{$item->name}}</a></h3>
                                                </div>
                                            </div>
                                        </div><!-- end item -->
                                    @endforeach
                                </div><!-- end carousel-inner -->

                                <!-- Controls -->
                                <a class="left carousel-control" href="#sidebar-carousel" role="button" data-slide="prev">
                                    <span class="fa fa-fw fa-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#sidebar-carousel" role="button" data-slide="next">
                                    <span class="fa fa-fw fa-chevron-right"></span>
                                </a>
                            </div><!-- end carousel -->
                        </div><!-- end widget -->



                    </div><!-- end sidebar -->
                </aside><!-- end secondary -->

            </div><!-- end row -->
        </div>
    </div><!-- end main -->
@endsection

