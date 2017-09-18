@extends('layouts.index')
@section('meta')
    <title>{{$price->title}}</title>
    <meta type="description" content="{{$price->description}}">
@endsection

@section('content')
    <div class="head-title">
        <div class="container">
            <div class="row">
                <h1 class="page-title">{{$price->name}}</h1>
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
                                <div class="row" style="padding-top: 20px;">
                                    <div class="col-sm-6">
                                        <div class="fotorama"  data-nav="thumbs" data-fit="cover"  data-width="100%">
                                            @foreach($price->images as $item)
                                                <img src="{{$item->img}}" alt="{{$item->alt}}" style="vertical-align: top;" data-fit="cover">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="price__wrap" style="vertical-align: top;">
                                            <div class="tm_pb_pricing_content" style="padding-top: 10px;padding-left: 0;padding-right: 0;">
                                                <ul class="tm_pb_pricing">
                                                    <li>Название товара: {{$price->name}}</li>
                                                    <li>Цена: <strong>{{$price->price}}</strong> руб</li>
                                                    @foreach($fea as $row)
                                                        @if(!empty($price->data[$row->name]))
                                                            <li>
                                                            <span>
                                                                {{$row->name_rus}}: {{$price->data[$row->name]}} {{$row->unit}}
                                                            </span>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    <li style="padding: 0;"><span>Производитель: <a href="{{route('product.maker', ['maker' => $price->makers->alias])}}">{{$price->makers->name}}</a></span></li>
                                                    <li style="padding: 0;"><span>Категория: <a href="{{route('product.category', ['category' => $price->category->alias])}}">{{$price->category->name}}</a></span></li>
                                                </ul>
                                            </div>
                                            <button class="btn btn-lg btn-default modal__click" style="display: block;margin: 20px auto;"   data-title="Заказать {{$price->name}}" data-textarea="Укажите дополнительную информацию" data-theme="Заказ товара {{$price->name}}" data-link="{{route('form.buy')}}">Заказать</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 30px;">{!! $price->text !!}</div>

                            </div>

                        </div><!-- end hentry -->
                    </div><!-- end site-content -->


                </div><!-- end site-content -->

                <aside id="secondary" class="col-md-4">
                    <div class="sidebar">



                        <div class="widget post-type-widget">
                            <h3 class="widget-title">Другие товары</h3>
                            <ul>
                                @foreach($other as $k => $item)
                                    <li>
                                        <figure class="post-thumbnail">
                                            <a href="{{route('product.makerproduct', ['maker' => $item->makers->alias, 'product' => $item->alias])}}"><img src="{{empty($item->activeimg) ? asset('img/noimg.png') : $item->activeimg->img}}" alt="{{empty($item->activeimg) ? $item->name : $item->activeimg->alt}}"></a>
                                        </figure>
                                        <h2 class="post-title">
                                            <a href="{{route('product.makerproduct', ['maker' => $item->makers->alias, 'product' => $item->alias])}}">{{$item->name}}</a>
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