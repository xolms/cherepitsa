@extends('layouts.index')
@section('meta')
    <title>Наши акции</title>
    <meta type="description" content="Акции такой то компании">
@endsection
@section('content')
    <section class="bloghome">
        <div class="container">
            <div class="row">
                <h3 class="home-title">Акции</h3>
                @foreach($events as $item)
                    <div class="col-sm-4" style="margin-bottom: 30px;">
                        <div class="inner">
                            <figure class="w-thumb">
                                <img src="{{$item->img}}" alt="{{$item->title}}">
                            </figure>
                            <div class="entry-header">
                                <h2 class="post-title entry-title">
                                    {{$item->title}}
                                </h2>
                            </div><!-- end entry-header -->
                            <div class="entry-content">
                                <p>
                                    {!! $item->text !!}
                                </p>
                                <p>
                                    <strong>Дата окончания: {{$item->date_end}}</strong>
                                </p>

                            </div><!-- entry-content -->
                        </div><!-- end inner -->
                    </div><!-- end column -->
                @endforeach

            </div><!-- end row -->
        </div>
    </section><!-- end blog -->

@endsection