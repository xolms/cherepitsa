@extends('layouts.index')
@section('meta')
    <title>{{$meta->title}}</title>
    <meta name="description" content="{{$meta->description}}">
    <meta name="keywords" content="{{$meta->keywords}}">
@endsection

@section('content')

    <div class="head-title">
        <div class="container">
            <div class="row">
                <h1 class="page-title">Наша продукция</h1>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end head-title -->
    <div id="main">
        <div class="container">
            <div class="row">
                @foreach($category as $k => $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="basic pricing">
                                <a href="{{route('product.catproduct', ['category' => $item->category->alias, 'product' => $item->alias])}}" class="tm-posts_img"><img src="{{$item->img}}" alt="{{$item->title}}" style="width: 50%;padding-bottom: 20px; vertical-align: top; margin-top: 15px;"></a>
                                <header class="pricing-header">

                                    <h3>
                                        <a href="{{route('product.catproduct', ['category' => $item->category->alias, 'product' => $item->alias])}}" class="pricing__title">{{$item->title}}</a>
                                    </h3>


                                    <p class="cost" style="font-size: 16px;top: 15px;">{{$item->price}}</p>
                                    <span class="year" style="top: 15px;">руб</span>
                                </header>
                                <div class="pricing-body">
                                    <ul>
                                        @foreach($fea as $row)
                                            @if(!empty($item->data[$row->name]))
                                                <li style="padding: 5px 0;">
                                                    <span>
                                                        {{$row->name_rus}}: {{$item->data[$row->name]}} {{$row->unit}}
                                                    </span>
                                                </li>
                                            @endif
                                        @endforeach
                                            <li style="padding: 5px 0;"><span>Производитель: <a href="{{route('product.maker', ['maker' => $item->makers->alias])}}">{{$item->makers->name}}</a></span></li>
                                            <li style="padding: 5px 0;"><span>Категория: <a href="{{route('product.category', ['category' => $item->category->alias])}}">{{$item->category->name}}</a></span></li>

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
        </div>
    </div>

@endsection