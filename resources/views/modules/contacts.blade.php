<div class="container-fluid">
    <div class=" row ">
        <!-- .tm_pb_column -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <iframe src="https://yandex.ru/map-widget/v1/-/CVgYMXJH"  height="700" frameborder="0" style="width: 100%;vertical-align: top;"></iframe>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="padding-top: 7%;">
            <div  class="comment-respond">
                <h2 class="comment-reply-title form__title" style="text-align: center;">Форма обратной связи</h2>
                <form method="post" action="{{route('form.contacts')}}" >

                    <div class="row">
                        <div class="col-md-12 " style="padding-bottom: 10px;">
                            <input  class="input-text" value="" name="name" placeholder="Ваше имя" data-required_mark="required" data-field_type="input" data-original_id="name" data-original_title="Name" type="text" style="width: 100%;">
                        </div>
                        <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                            <input  class="input-text" value="" name="mail" placeholder="Ваш e-mail" data-required_mark="required" data-field_type="email" data-original_id="email" data-original_title="Email Address" type="email" style="width: 100%;">
                        </div>
                        <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                            <input class="input-text" value="" name="phone" placeholder="Ваш телефон" data-required_mark="required" data-field_type="tel" data-original_id="tel" data-original_title="Telephone" type="tel" style="width: 100%;">
                        </div>
                        <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                            <textarea name="message" class="input-text" placeholder="Ваше сообщение" data-required_mark="required" data-field_type="text" data-original_id="message" data-original_title="Message" style="height: 110px;width: 100%;"></textarea>
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
            </div>
            <!-- .tm_pb_contact_form -->
        </div>
        <!-- .tm_pb_column -->
    </div>
    <!-- .tm_pb_row -->
</div>
<!-- .tm_pb_section -->
</div>
</div>


