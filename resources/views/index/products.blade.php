<div class="container" style="width: 90%;min-width: 320px;">
    <div class="row">
        <h3 class="home-title">
            <span class="wrap-1">Наша </span>
            <span class="wrap-2">Продукция </span>
        </h3>
    </div>
    <div class="row">

        <div class="content-area" id="primary">
            @foreach($category as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="basic pricing">
                        <a href="{{route('product.category',['category' => $item->alias])}}" class="tm-posts_img"><img src="{{$item->img}}" alt="{{$item->title}}" style="width: 50%;padding-bottom: 20px; vertical-align: top; margin-top: 15px;"></a>
                        <header class="pricing-header">

                            <h3>
                                <a href="{{route('product.category',['category' => $item->alias])}}" class="pricing__title">{{$item->title}}</a>
                            </h3>

                            <span class="year">от</span>
                            <p class="cost" style="top: -10px;line-height: 25px;">{{$item->min_price}}</p>
                            <span class="year">руб</span>
                        </header>
                        <div class="pricing-body">
                            <ul>
                                <li><strong>Производители:</strong><br/>
                                    <span class="pricing__list">
                                        @foreach($item->maker as $value)
                                            <a href="{{route('product.maker', ['maker' => $value->alias])}}" class="pricing__maker">{{$value->name}}</a>
                                        @endforeach
                                    </span>

                                </li>
                                <li>
                                    <strong>Дополнительные услуги:</strong>
                                    <br/>
                                    <span class="montage__wrap">
                                        @if($item->montage)
                                            <span class="montage__item montage__item_montage">Монтаж</span>
                                        @else
                                            <span class="montage__item"></span>
                                        @endif
                                        @if($item->leaves)
                                            <span class="montage__item montage__item_leaves">Доставка</span>
                                        @else
                                            <span class="montage__item"></span>
                                        @endif
                                        @if($item->garant)
                                            <span class="montage__item montage__item_garant">Гарантия</span>
                                        @else
                                            <span class="montage__item"></span>
                                        @endif
                                    </span>
                                </li>

                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a href="{{route('product.category',['category' => $item->alias])}}" class="btn btn-md btn-default">Подробнее</a>
                        </div>
                    </div><!-- end basic -->
                </div><!-- end col -->
            @endforeach

        </div><!-- end content-area -->

    </div><!-- end row -->
</div>