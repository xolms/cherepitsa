@extends('layouts.index')
@section('meta')
    <title>{{$meta->title}}</title>
    <meta type="description" content="{{$meta->description}}">
@endsection

@section('content')

    <div class="head-title">
        <div class="container">
            <div class="row">
                <h2 class="page-title">Товары производителя {{$meta->name}}</h2>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end head-title -->
    <div id="main">
        <div class="container">
            <div class="row">
                @foreach($category as $k => $item)
                    <div class="col-md-4 col-sm-6">
                        <div class="basic pricing">
                            <a href="{{route('product.makerproduct', ['maker' => $item->makers->alias, 'product' => $item->alias])}}" class="tm-posts_img"><img src="{{$item->img}}" alt="{{$item->title}}" style="width: 50%;padding-bottom: 20px; vertical-align: top; margin-top: 15px;"></a>
                            <header class="pricing-header">

                                <h3>
                                    <a href="{{route('product.makerproduct', ['maker' => $item->makers->alias, 'product' => $item->alias])}}" class="pricing__title">{{$item->title}}</a>
                                </h3>


                                <p class="cost" style="font-size: 16px;top: 15px;">{{$item->price}}</p>
                                <span class="year" style="top: 15px;">руб</span>
                            </header>
                            <div class="pricing-body">
                                <ul>
                                    @if(isset($item->color))
                                        <li><span>Цвет: {{$item->color}}</span></li>
                                    @endif
                                    @if(isset($item->picture))
                                        <li><span>Рисунок: {{$item->picture}}</span></li>
                                    @endif
                                    @if(isset($item->type))
                                        <li><span>Тип: {{$item->type}}</span></li>
                                    @endif
                                    @if(isset($item->weight))
                                        <li><span>Вес: {{$item->weight}}</span></li>
                                    @endif
                                    <li><span>Производитель: <a href="{{route('product.maker', ['maker' => $item->makers->alias])}}">{{$item->makers->name}}</a></span></li>
                                    <li><span>Категория: <a href="{{route('product.category', ['category' => $item->category->alias])}}">{{$item->category->name}}</a></span></li>

                                    </span>

                                    </li>


                                </ul>
                            </div>
                            <div class="pricing-btn">
                                <button class="btn btn-md btn-default modal__click"   data-title="Заказать {{$item->name}}" data-textarea="Укажите дополнительную информацию" data-theme="Заказ товара {{$item->name}}" data-link="{{route('form.buy')}}" style="color: #000;">Заказать</button>
                            </div>
                        </div><!-- end basic -->
                    </div><!-- end col -->
                @endforeach





            </div>
            <div class="row">
                {{$category->links('paginate.paginate')}}
            </div>
            <div class="row">
                <h2 style="text-align:center;">{{$meta->name}}</h2>
                <div class="text__wrap">
                    {!! $meta->short_text !!}
                </div>
                @if($meta->short_text != $meta->text)
                    <div class="text__button" style="text-align:center;margin-bottom:30px">
                        <form action="{{route('page.alltext')}}" method="post" class="form__more">
                            {{csrf_field()}}
                            <input type="hidden" name="path" value="{{Route::currentRouteName()}}">
                            <input type="hidden" name="alias" value="{{$meta->alias}}">
                            <button class="btn btn-lg btn-default button-text" type="submit">Подробнее</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        jQuery('.button-text')
    </script>
@endsection