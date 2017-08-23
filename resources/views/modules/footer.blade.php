

<footer id="footer-section" class="site-footer" style="margin-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-inner">
                        <h3 class="widget-title">О нас</h3>
                        <p>
                            <img src="{{asset('images/content/logo-light.png')}}" alt="{{$_SERVER['SERVER_NAME']}}">
                        </p>
                        {!! $about->short_text !!}
                       <p><a href="{{route('about.index')}}" class="more">Подробнее</a></p>
                    </div><!-- end inner -->
                </div><!-- end widget -->
            </div>

            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-inner">
                        <h3 class="widget-title">Контактные данные</h3>
                        <table>
                            <tr>
                                <td><strong>Адрес</strong></td>
                                <td> : {{$setting['adres']}}</td>
                            </tr>
                            <tr>
                                <td><strong>Телефон</strong></td>
                                <td> : <a href="tel:{{$setting['telefon']}}">{{$setting['telefon']}}</a>;<br/>
                                     : <a href="tel:{{$setting['dopolnitel-nyy-telefon']}}">{{$setting['dopolnitel-nyy-telefon']}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td> : <a href="mailto:{{$setting['e-mail']}}">{{$setting['e-mail']}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Часы работы</strong></td>
                                <td> : {{$setting['chasy-raboty']}}</td>
                            </tr>
                        </table>
                    </div><!-- end inner -->
                </div><!-- end widget -->
            </div>

            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-inner">
                        <h3 class="widget-title">Навигация</h3>
                        <nav class="footer__nav" role="navigation">
                            <div class="nav-menu">
                                <ul class="menu">

                                    <li class={{Route::is('index') ? 'active' : '' }} ><a href="/">Главная</a></li>
                                    <li class={{Route::is('products.index') ? 'active' : '' }}><a href="{{route('products.index')}}">Продукция</a>
                                    </li>
                                    <li class={{Route::is('event.index') ? 'active' : '' }}><a href="{{route('event.index')}}">Акции</a></li>
                                    <li class={{Route::is('uslugi.index') ? 'active' : '' }}><a href="{{route('uslugi.index')}}">Услуги</a>
                                    </li>
                                    <li  class={{Route::is('about.index') ? 'active' : '' }}><a href="{{route('about.index')}}">О компании</a></li>
                                    <li class={{Route::is('work.index') ? 'active' : '' }}><a href="{{route('work.index')}}">Наши работы</a></li>
                                    <li class={{Route::is('contact.index') ? 'active' : '' }}><a href="{{route('contact.index')}}">Контакты</a>

                                    </li>
                                </ul>
                            </div><!-- end nav-menu -->
                        </nav><!-- primary-navigation -->
                    </div><!-- end inner -->
                </div><!-- end widget -->
            </div>
        </div>
    </div>
</footer>

<div class="footer-credit">

    <p class="copy">COPYRIGHT &copy; 2015 - {{\Carbon\Carbon::now()->year}} {{$_SERVER['SERVER_NAME']}}.</p>
</div><!-- end footer-credit -->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/vendor/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/notify.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

