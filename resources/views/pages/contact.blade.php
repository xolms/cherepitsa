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
                <h1 class="page-title">Контакты</h1>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end head-title -->

    <div id="main">
        <div class="container">
            <div class="row">

                <div class="content-area col-md-12" id="primary">
                    <div class="site-content" id="content">

                        <article class="post hentry">

                            <header class="entry-header">

                                <div class="entry-map">

                                    <div class="map">
                                        <iframe src="https://yandex.ru/map-widget/v1/-/CBUrnCbnwB"  height="700" frameborder="0" style="width: 100%;vertical-align: top;"></iframe>
                                    </div><!-- end map -->

                                </div><!-- end entry-media -->

                            </header><!-- end entry-header -->

                            <div class="entry-content" style="padding-top: 20px;">

                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <strong>Контактные данные : </strong><br/>
                                            Адрес : {{$setting['adres']}}<br/>
                                            Телефон : <a href="tel:{{$setting['telefon']}}">{{$setting['telefon']}}</a><br/>
                                            Дополнительный телефон : <a href="tel:{{$setting['dopolnitel-nyy-telefon']}}">{{$setting['dopolnitel-nyy-telefon']}}</a><br/>
                                            Email : <a href="mailto:{{$setting['e-mail']}}">{{$setting['e-mail']}}</a><br/>
                                            Часы работы : {{$setting['chasy-raboty']}}<br/>
                                        </p>
                                    </div>

                                </div><!-- end row -->
                            </div><!-- end entry-content -->

                        </article><!-- end hentry -->

                        <div class="comment-outer">
                            <div id="respond" class="comment-respond">
                                <h2 id="reply-title" class="comment-reply-title">Форма обратной связи</h2>
                                <form method="post" action="{{route('form.contacts')}}" >

                                    <div class="row">
                                        <div class="col-md-12 " style="padding-bottom: 10px;">
                                            <label for="name">Имя</label>
                                            <input id="name"  class="input-text" value="" name="name" placeholder="Ваше имя" data-required_mark="required" data-field_type="input" data-original_id="name" data-original_title="Name" type="text" style="width: 100%;">
                                        </div>
                                        <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                                            <label for="mail">E-mail</label>
                                            <input id="mail" class="input-text" value="" name="mail" placeholder="Ваш e-mail" data-required_mark="required" data-field_type="email" data-original_id="email" data-original_title="Email Address" type="email" style="width: 100%;">
                                        </div>
                                        <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                                            <label for="tel">Телефон</label>
                                            <input id="tel" class="input-text" value="" name="phone" placeholder="Ваш телефон" data-required_mark="required" data-field_type="tel" data-original_id="tel" data-original_title="Telephone" type="tel" style="width: 100%;">
                                        </div>
                                        <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                                            <label for="message">Сообщение</label>
                                            <textarea id="message" name="message" class="input-text" placeholder="Ваше сообщение" data-required_mark="required" data-field_type="text" data-original_id="message" data-original_title="Message" style="height: 110px;width: 100%;"></textarea>
                                        </div>
                                        <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                                            <input type="checkbox" name="pers" id="pers" checked style="display: inline; float: left;">
                                            <label for="pers" style="display: inline;padding-left: 10px;font-size: 14px;color: #000;">
                                                Нажимая на кнопку, я даю свое согласие на <a href="{{route('pdf.pers')}}" class="contact-form__link"> обработку персональных данных</a> и соглашаюсь с условиями <a href="{{route('pdf.conf')}}" class="contact-form__link">политики конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="tm_contact_bottom_container category__footer">
                                        <input type="hidden" name="theme" class="input__theme">
                                        {{ csrf_field() }}
                                        <button type="submit" class="tm_pb_button btn btn-md btn-default" style="max-width: 200px; margin-left: auto;margin-right: auto;display: block;">Отправить</button>
                                    </div>
                                </form>
                            </div><!-- end comment-respond -->
                        </div><!-- end comment-outer -->


                    </div><!-- end site-content -->
                </div><!-- end content-area -->

            </div><!-- end row -->
        </div>
    </div><!-- end main -->


@endsection
