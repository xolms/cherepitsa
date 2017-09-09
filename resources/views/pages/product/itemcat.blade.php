@extends('layouts.index')
@section('meta')
    <title>{{$price->title}}</title>
    <meta type="description" content="{{$price->description}}">
@endsection

@section('content')
    <div class="head-title">
        <div class="container">
            <div class="row">
                <h2 class="page-title">{{$price->name}}</h2>
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
                                <img src="{{$price->img}}" alt="{{$price->name}}" style="width: 100%;height: auto;padding-bottom: 25px; padding-top: 25px;">
                                <div class="price__wrap" style="vertical-align: top;">
                                    <?php
                                    foreach ($price->makers->category as $row) {
                                        $cat = $row;
                                    }
                                    ?>
                                    <div class="tm_pb_pricing_content" style="padding-top: 10px;padding-left: 0;padding-right: 0;">
                                        <ul class="tm_pb_pricing">
                                            <li>Название товара: {{$price->name}}</li>
                                            <li>Цена: <strong>{{$price->price}}</strong> руб</li>
                                            @if(isset($price->color))
                                                <li style="padding: 0;"><span>Цвет: {{$price->color}}</span></li>
                                            @endif
                                            @if(isset($price->picture))
                                                <li style="padding: 0;"><span>Рисунок: {{$price->picture}}</span></li>
                                            @endif
                                            @if(isset($price->type))
                                                <li style="padding: 0;"><span>Тип: {{$price->type}}</span></li>
                                            @endif
                                            @if(isset($price->weight))
                                                <li style="padding: 0;"><span>Вес: {{$price->weight}}</span></li>
                                            @endif
                                            <li style="padding: 0;"><span>Производитель: <a href="{{route('product.maker', ['maker' => $price->makers->alias])}}">{{$price->makers->name}}</a></span></li>
                                            <li style="padding: 0;"><span>Категория: <a href="{{route('product.category', ['category' => $price->category->alias])}}">{{$price->category->name}}</a></span></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-lg btn-default modal__click" style="display: block;margin: 20px auto;"   data-title="Заказать {{$price->name}}" data-textarea="Укажите дополнительную информацию" data-theme="Заказ товара {{$price->name}}" data-link="{{route('form.buy')}}">Заказать</button>
                                </div>
                                {!! $price->text !!}
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
                                            <a href="{{route('product.catproduct', ['category' => $item->category->alias, 'product' => $item->alias])}}"><img src="{{$item->img}}" alt="{{$item->name}}"></a>
                                        </figure>
                                        <h2 class="post-title">
                                            <a href="{{route('product.catproduct', ['category' => $item->category->alias, 'product' => $item->alias])}}">{{$item->name}}</a>
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