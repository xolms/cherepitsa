

<footer id="colophon" class="site-footer default" role="contentinfo">
    <div class="footer-area-wrap invert">
        <div class="container">
            <section id="footer-area" class="footer-area widget-area footer-area--4-cols row">
                <aside id="contractor_widget_about-2" class="col-xs-12 col-sm-12 col-md-6 col-lg-3  widget widget-about">
                    <div class="widget-about__logo">
                        <a class="widget-about__logo-link" href="https://ld-wp.template-help.com/wordpress_61152/">
                            <img class="widget-about__logo-img" src="https://ld-wp.template-help.com/wordpress_61152/wp-content/uploads/2017/01/footer-logo.png" alt="Contractor">
                        </a>
                    </div>
                    <div class="widget-about__tagline"></div>
                    <div class="widget-about__content">Construction's core values have been shaped over more than 10 years of delivering the finest construction services to our clients. They stood to the test of time and these principles remain our bedrock lynchpins. We never tried to cut on either quality, the pace of work or any other construction aspect. We stay true to our full promise of efficiency!</div>
                </aside>
                <aside id="nav_menu-3" class="col-xs-12 col-sm-12 col-md-6 col-lg-3  widget widget_nav_menu">
                    <h6 class="widget-title">Навигация</h6>
                    <div class="menu-footer-menu-container">
                        <ul id="menu-footer-menu" class="menu">
                            <li  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-421"><a href="{{route('products.index')}}">Продукция</a></li>
                            <li  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-422"><a href="{{route('events.index')}}">Акции</a></li>
                            <li  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-422"><a href="{{route('uslugi.index')}}">Услуги</a></li>
                            <li  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-422"><a href="{{route('about.index')}}">О компании</a></li>
                            <li  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-422"><a href="{{route('work.index')}}">Наши работы</a></li>
                            <li  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-422"><a href="{{route('contact.index')}}">Контакты</a></li>
                        </ul>
                    </div>
                </aside>
                <aside id="recent-comments-5" class="col-xs-12 col-sm-12 col-md-6 col-lg-3  widget widget_recent_comments">
                    <h6 class="widget-title">RECENT COMMENTS</h6>
                    <ul id="recentcomments">
                        <li class="recentcomments"><span class="comment-author-link">Brian Williamson</span> on <a href="https://ld-wp.template-help.com/wordpress_61152/2016/07/12/how-to-save-10-grand-a-year-with-digital-blueprints/#comment-3">How to save 10 grand a year with digital blueprints</a></li>
                        <li class="recentcomments"><span class="comment-author-link">Adam Smith</span> on <a href="https://ld-wp.template-help.com/wordpress_61152/2016/07/12/how-to-save-10-grand-a-year-with-digital-blueprints/#comment-2">How to save 10 grand a year with digital blueprints</a></li>
                    </ul>
                </aside>
                <aside id="contractor_contact_information_widget-2" class="col-xs-12 col-sm-12 col-md-6 col-lg-3  widget contact-information-widget">
                    <h6 class="widget-title">Контакты</h6>
                    <ul class="contact-information-widget__inner">
                        <li class="contact-information__item ">
                            Адрес: {{$setting['adres']}}
                        </li>
                        <li class="contact-information__item ">
                            Телефон: <a href="tel:{{$setting['telefon']}}">{{$setting['telefon']}}</a>; <a href="tel:{{$setting['dopolnitel-nyy-telefon']}}">{{$setting['dopolnitel-nyy-telefon']}}</a>
                        </li>
                        <li class="contact-information__item ">
                            E-mail: <a href="mailto:{{$setting['e-mail']}}">{{$setting['e-mail']}}</a>
                        </li>
                    </ul>
                </aside>
            </section>
        </div>
    </div>
    <div class="footer-container invert">
        <div class="site-info container">
            <div class="site-info-wrap">
                <div class="footer-copyright">{{$_SERVER['SERVER_NAME']}} &copy; 2016-{{date('Y')}}.</div>

            </div>
        </div>
        <!-- .site-info -->
    </div>
    <!-- .container -->
</footer>
<!-- #colophon -->

