@extends('layouts.index')
@section('meta')
    @if(isset($usluga))
        <title>{{$usluga->name}}</title>
    @else
        <title>Наши работы</title>
    @endif
    @if(isset($usluga))
        <meta type="description" content="{{$usluga->name}} примеры работ">
    @else
        <meta type="description" content="Работы такой то компании">
    @endif

@endsection
@section('content')
    <div class="head-title">
        <div class="container">
            <div class="row">
                <h1 class="page-title">{{isset($usluga->name) ? $usluga->name : 'Наши работы'}}</h1>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end head-title -->
    <div id="main">
        <div class="container">
            <div class="row">

                <div class="content-area col-md-8" id="primary">
                    <div class="site-content" id="content">
                        @foreach($works as $item)
                            <div class="post format-image hentry">

                                <header class="entry-header">
                                    <div class="entry-format" style="padding: 0;">
                                    </div><!-- end entry-format -->

                                    <div class="entry-media">
                                        <img src="{{$item->img}}" alt="{{$item->name}}">
                                    </div><!-- end entry-media -->

                                    <h1 class="entry-title">
                                        <a href="{{route('work.alias', ['category' => $item->usluga->alias, 'alias' => $item->alias])}}">{{$item->name}}</a>
                                    </h1>

                                </header><!-- end entry-header -->

                                <div class="entry-content">
                                    {!! $item->short_text !!}
                                    <p>
                                        <a href="{{route('work.alias', ['category' => $item->usluga->alias, 'alias' => $item->alias])}}" class="more">Подробнее</a>
                                    </p>
                                </div>

                            </div><!-- end hentry -->
                        @endforeach


                    </div><!-- end site-content -->

                    {{$works->links('paginate.paginate')}}

                </div><!-- end content-area -->

                <aside id="secondary" class="col-md-4">
                    <div class="sidebar">


                        <div class="widget post-type-widget">
                            <h3 class="widget-title">Категории работ</h3>
                            <ul>
                                @foreach($items as $item)
                                    <li>

                                        <figure class="post-thumbnail">
                                            <a href="{{route('work.category', $item->alias)}}"><img src="{{$item->bg}}" alt="{{$item->name}}"></a>
                                        </figure>
                                        <h2 class="post-title">
                                            <a href="{{route('work.category', $item->alias)}}">{{$item->name}}</a>
                                        </h2>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- end widget -->









                    </div><!-- end sidebar -->
                </aside><!-- end secondary -->

            </div><!-- end row -->

        </div>
    </div><!-- end main -->


@endsection