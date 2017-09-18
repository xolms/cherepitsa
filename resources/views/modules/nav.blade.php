
<header id="masthead" class="site-header navbar-fixed-top">
    <div class="header-navigation">
        <div class="container-fluid">
            <div class="row">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".site-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="logo navbar-brand">
                    <a href="/">
                        <img src="{{asset('images/header-logo.png')}}" alt="{{$_SERVER['SERVER_NAME']}}" style="margin-left:20px">
                    </a>
                </div><!-- end logo -->

                <nav id="primary-navigation" class="site-navigation navbar-collapse collapse" role="navigation">
                    <div class="nav-menu">
                        <ul class="menu">
                            <li class={{Route::is('index') ? 'active' : '' }} ><a href="/">Главная</a></li>
                            <li class="has-child {{Route::is('products.index') || Route::is('product.category') || Route::is('product.maker') || Route::is('product.product') ? 'active' : '' }}">
                                <a href="{{route('products.index')}}">Продукция</a>
                                <ul class="sub-menu">
                                    @foreach($categories as $item)
                                        <li>
                                            <a href="{{route('product.category',['category' => $item->alias])}}">{{$item->name}}</a>
                                        </li>

                                    @endforeach
                                </ul>
                            </li>

                            </li>
                            <li class={{Route::is('event.index') ? 'active' : '' }}><a href="{{route('event.index')}}" style="color: #f6c606">Акции</a></li>
                            <li class="has-child {{Route::is('uslugi.index') || Route::is('usluga.item') || Route::is() ? 'active' : '' }}">
                                <a href="{{route('uslugi.index')}}">Услуги</a>
                                <ul class="sub-menu">
                                    @foreach($nav_usluga as $item)
                                        <li><a href="{{route('usluga.item', $item->alias)}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{Route::is('about.index') ? 'active' : '' }}">
                                <a href="{{route('about.index')}}">О компании</a>
                            </li>
                            <li class="has-child {{Route::is('work.index') || Route::is('work.category')  ? 'active' : '' }}">
                                <a href="{{route('work.index')}}">Наши работы</a>
                                <ul class="sub-menu">
                                    @foreach($nav_usluga as $item)
                                        <li><a href="{{route('work.category', $item->alias)}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li  class="{{Route::is('contact.index') ? 'active' : '' }}"><a href="{{route('contact.index')}}">Контакты</a></li>
                        </ul>
                    </div><!-- end nav-menu -->
                </nav><!-- primary-navigation -->

                <div class="header-feature">
                    <button class="btn btn-lg btn-default modal__click" style="float: right;font-size: 14px;font-weight: 700;text-transform: uppercase;" data-title="Вызвать замерщика" data-textarea="Укажите дополнительную информацию: куда прибыть, во сколько и тд" data-theme="Вызвать замерщика" data-link="{{route('form.zamer')}}">Вызвать замерщика</button>

                </div><!-- end header-feature -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-navigation -->
</header><!-- end #masthead -->