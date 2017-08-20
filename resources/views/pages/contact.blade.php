@extends('layouts.second')
@section('meta')
    <title>Наши контакты</title>
    <meta type="description" content="Наши контакты">
@endsection
@section('body')
    page-template-default page page-id-293 use-tm-pb-builder header-layout-fullwidth content-layout-fullwidth footer-layout-fullwidth blog-default position-fullwidth sidebar-1-3 header-style-4 footer-default tm_pb_builder
@endsection
@section('content')


    <div id="content" class="site-content">
        <div class="site-content_wrap">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-12">
                    <main id="main" class="site-main" role="main">
                        <article id="post-293" class="post-293 page type-page status-publish hentry no-thumb">
                            <header class="entry-header">
                                <h1 class="entry-title screen-reader-text">Контакты</h1>
                            </header>
                            <!-- .entry-header -->
                            <div class="entry-content">
                                <div class="tm_builder_outer_content" id="tm_builder_outer_content">
                                    <div class="tm_builder_inner_content tm_pb_gutters3">
                                        <div class="tm_pb_section  tm_pb_section_0 tm_section_regular tm_section_transparent">
                                            <div class=" row tm_pb_row tm_pb_row_0 tm_pb_row_fullwidth tm_pb_col_padding_reset">
                                                <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_0 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                                                    <div class="tm_pb_module tm_pb_map_container  tm_pb_map_0">
                                                        <iframe src="https://yandex.ru/map-widget/v1/-/CVgYMXJH"  height="700" frameborder="0" style="width: 100%;vertical-align: top;"></iframe>
                                                    </div>
                                                </div>
                                                <!-- .tm_pb_column -->
                                            </div>
                                            <!-- .tm_pb_row -->
                                        </div>
                                        <!-- .tm_pb_section -->
                                        <div class="tm_pb_section  tm_pb_section_1 tm_section_regular tm_section_transparent">
                                            <div class="container">
                                                <div class=" row tm_pb_row tm_pb_row_1">
                                                    <div class="tm_pb_column tm_pb_column_1_3  tm_pb_column_1 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 tm_pb_vertical_alligment_start">
                                                        <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_left  tm_pb_text_0">
                                                            <h4>Контактные данные</h4>
                                                            <p>&nbsp;</p>
                                                            <ul class="list">
                                                                <li><span style="color: #000000;"><strong>Адрес:</strong></span> {{$settings['adres']}}</li>
                                                                <li><span style="color: #000000;"><strong>Телефон:</strong></span> <a href="tel:{{$settings['telefon']}}">{{$settings['telefon']}}</a></li>
                                                                <li><span style="color: #000000;"><strong>Дополнительный телефон:</strong></span> <a href="tel:{{$settings['dopolnitel-nyy-telefon']}}">{{$settings['dopolnitel-nyy-telefon']}}</a></li>
                                                                <li><span style="color: #000000;"><strong>Е-маил:</strong></span> <a href="mailto:{{$settings['e-mail']}}">{{$settings['e-mail']}}</a></li>
                                                                <li><span style="color: #000000;"><strong>Время работы:</strong> </span>{{$settings['chasy-raboty']}}</li>
                                                            </ul>
                                                        </div>
                                                        <!-- .tm_pb_text -->

                                                        <!-- .tm_pb_counters -->
                                                    </div>
                                                    <!-- .tm_pb_column -->
                                                    <div class="tm_pb_column tm_pb_column_2_3  tm_pb_column_2 col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 tm_pb_vertical_alligment_start">
                                                        <div  class="tm_pb_contact_form tm_pb_contact_form_0 clearfix tm_pb_module">
                                                            <h2 class="tm_pb_contact_main_title form__title" >Форма обратной связи</h2>
                                                            <form class='' method="post" action="{{route('form.contacts')}}">
                                                                <div class="tm-pb-contact-message"></div>
                                                                <div class="row">
                                                                    <div class="tm_pb_contact_field col-md-12 ">
                                                                        <input id="tm_pb_contact_name_1" class="tm_pb_contact_form_input" value="" name="name" placeholder="Ваше имя" data-required_mark="required" data-field_type="input" data-original_id="name" data-original_title="Name" type="text">
                                                                    </div>
                                                                    <div class="tm_pb_contact_field col-md-12 ">
                                                                        <input id="tm_pb_contact_email_1" class="tm_pb_contact_form_input" value="" name="mail" placeholder="Ваш e-mail" data-required_mark="required" data-field_type="email" data-original_id="email" data-original_title="Email Address" type="email">
                                                                    </div>
                                                                    <div class="tm_pb_contact_field col-md-12 ">
                                                                        <input id="tm_pb_contact_phone_1" class="tm_pb_contact_form_input" value="" name="phone" placeholder="Ваш телефон" data-required_mark="required" data-field_type="tel" data-original_id="tel" data-original_title="Telephone" type="tel">
                                                                    </div>
                                                                    <div class="tm_pb_contact_field col-md-12 ">
                                                                        <textarea name="message" id="tm_pb_contact_message_1" class="tm_pb_contact_message tm_pb_contact_form_input" placeholder="Ваше сообщение" data-required_mark="required" data-field_type="text" data-original_id="message" data-original_title="Message" style="height: 110px;"></textarea>
                                                                    </div>
                                                                    <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 20px;">
                                                                        <input type="checkbox" name="pers" id="pers" checked>
                                                                        <label for="pers">
                                                                            Нажимая на кнопку, я даю свое согласие на <a href="{{route('pdf.pers')}}" class="contact-form__link"> обработку персональных данных</a> и соглашаюсь с условиями <a href="{{route('pdf.conf')}}" class="contact-form__link">политики конфиденциальности</a>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="tm_contact_bottom_container">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="theme" class="input__theme" value="Обратная связь">
                                                                    <button type="submit" class="tm_pb_button">Отправить</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                         <!-- .tm_pb_contact_form -->
                                                    </div>
                                                    <!-- .tm_pb_column -->
                                                </div>
                                                <!-- .tm_pb_row -->
                                            </div>
                                        </div>
                                        <!-- .tm_pb_section -->
                                    </div>
                                </div>
                            </div>
                            <!-- .entry-content -->
                            <footer class="entry-footer">
                            </footer>
                            <!-- .entry-footer -->
                        </article>
                        <!-- #post-## -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>


@endsection
@section('script')
    <style type="text/css">
        .site {
            min-height: 100%;
        }
        .form__title::before {
            display: block !important;}
    </style>
    <style type="text/css" >
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_8 { order: 4; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_3.tm_pb_number_counter .percent { font-size: 60px !important; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_2 .percent { color: #f9b707; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_2.tm_pb_number_counter .percent { font-size: 60px !important; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_7 { order: 3; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_3 .percent { color: #f9b707; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_section_3 { padding-top: 130px; padding-bottom: 30px; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_11 { order: 1; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_12 { order: 2; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_section_5 { padding-top: 130px; padding-bottom: 73px; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_10 { order: 1; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_9 { order: 1; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_1 .percent { color: #f9b707; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_1.tm_pb_number_counter .percent { font-size: 60px !important; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_1 { order: 1; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_2 { order: 2; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_section_1 { padding-top: 119px; padding-bottom: 56px; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_text_0 { max-width: 900px; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_0 { order: 1; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_3 { order: 1; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_4 { order: 2; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_0 .percent { color: #f9b707; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_6 { order: 2; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_number_counter_0.tm_pb_number_counter .percent { font-size: 60px !important; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_column_5 { order: 1; }
        .tm_pb_builder #tm_builder_outer_content .tm_pb_section_2 { padding-top: 160px; padding-bottom: 130px; }
        @media only screen and ( max-width: 991px ) {
            .tm_pb_builder #tm_builder_outer_content .tm_pb_section_3 { padding-top: 70px;padding-bottom: 13px; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_8 { order: 4; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_7 { order: 3; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_9 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_10 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_12 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_11 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_section_5 { padding-top: 100px;padding-bottom: 50px; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_6 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_5 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_1 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_section_1 { padding-top: 70px;padding-bottom: 15px; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_0 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_2 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_3 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_section_2 { padding-top: 100px;padding-bottom: 70px; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_4 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_section_0 { padding-top: 100px;padding-right: 15px;padding-bottom: 100px;padding-left: 15px; }
        }
        @media only screen and ( min-width: 992px ) and ( max-width: 1440px ) {
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_9 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_8 { order: 4; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_10 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_11 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_12 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_7 { order: 3; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_6 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_2 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_1 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_3 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_4 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_5 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_0 { order: 1; }
        }
        @media only screen and ( max-width: 767px ) {
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_9 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_8 { order: 4; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_10 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_11 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_12 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_7 { order: 3; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_6 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_2 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_1 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_3 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_4 { order: 2; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_5 { order: 1; }
            .tm_pb_builder #tm_builder_outer_content .tm_pb_column_0 { order: 1; }
        }
    </style>
@endsection