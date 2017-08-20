<nav id="site-navigation" class="main-navigation" role="navigation">
    <ul id="main-menu" class="menu">
        <li  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-371">
            <a href="{{route('products.index')}}">Продукция<span class="sub-menu-toggle"></span></a>
            <ul class="sub-menu">
                @foreach($categories as $item)
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-255">
                        <a href="{{route('product.category',['category' => $item->alias])}}">{{$item->name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-295"><a href="{{route('event.index')}}">Акции</a></li>
        <li  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-371">
            <a href="{{route('uslugi.index')}}">Услуги<span class="sub-menu-toggle"></span></a>
            <ul class="sub-menu">
                @foreach($nav_usluga as $item)
                    <li class="menu-item menu-item-type-post_type menu-item-object-page" ><a href="{{route('usluga.item', $item->alias)}}">{{$item->name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-295"><a href="{{route('about.index')}}">О компании</a></li>
        <li  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-371">
            <a href="{{route('work.index')}}">Наши работы<span class="sub-menu-toggle"></span></a>
            <ul class="sub-menu">
                @foreach($nav_usluga as $item)
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-255"><a href="{{route('work.category', $item->alias)}}">{{$item->name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-295"><a href="{{route('contact.index')}}">Контакты</a></li>
    </ul>
</nav>