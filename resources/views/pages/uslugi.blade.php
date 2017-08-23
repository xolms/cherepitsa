@extends('layouts.index')
@section('meta')
    <title>Список услуг</title>
    <meta type="description" content="Список услуг">
@endsection

@section('content')
    <section class="bloghome">
        <div class="container">
            <div class="row">
                <h3 class="home-title">Услуги</h3>
                @foreach($usluga as $item)
                    <div class="col-sm-4" style="margin-bottom: 30px;">
                        <div class="inner">
                            <figure class="w-thumb">
                                <img src="{{$item->bg}}" alt="{{$item->name}}">
                            </figure>
                            <div class="entry-header">
                                <h2 class="post-title entry-title">
                                    <a href="{{route('usluga.item', $item->alias)}}">{{$item->name}}</a>
                                </h2>
                            </div><!-- end entry-header -->
                            <div class="entry-content">
                                <p>
                                    {!! $item->short_text !!}
                                </p>

                                <p>
                                    <a href="{{route('usluga.item', $item->alias)}}" class="more">Подробнее</a>
                                </p>
                            </div><!-- entry-content -->
                        </div><!-- end inner -->
                    </div><!-- end column -->
                @endforeach

            </div><!-- end row -->
        </div>
    </section><!-- end blog -->
@endsection
