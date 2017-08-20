<div class="modal">
    <div class="modal__wrapper">
        <div class="modal__close">

        </div>
        <div  class="tm_pb_contact_form tm_pb_contact_form_0 clearfix tm_pb_module">
            <h2 class="tm_pb_contact_main_title form__title" style="text-align: center;">Форма обратной связи</h2>
            <form method="post" action="{{route('form.zamer')}}">
                <div class="tm-pb-contact-message"></div>
                <div class="row">
                    <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                        <input id="tm_pb_contact_name_1" class="tm_pb_contact_form_input" value="" name="name" placeholder="Ваше имя" data-required_mark="required" data-field_type="input" data-original_id="name" data-original_title="Name" type="text">
                    </div>
                    <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                        <input id="tm_pb_contact_email_1" class="tm_pb_contact_form_input" value="" name="mail" placeholder="Ваш e-mail" data-required_mark="required" data-field_type="email" data-original_id="email" data-original_title="Email Address" type="email">
                    </div>
                    <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                        <input id="tm_pb_contact_phone_1" class="tm_pb_contact_form_input" value="" name="phone" placeholder="Ваш телефон" data-required_mark="required" data-field_type="tel" data-original_id="tel" data-original_title="Telephone" type="tel">
                    </div>
                    <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                        <textarea name="message" id="tm_pb_contact_message_1" class="tm_pb_contact_message tm_pb_contact_form_input" placeholder="Ваше сообщение" data-required_mark="required" data-field_type="text" data-original_id="message" data-original_title="Message" style="height: 110px;"></textarea>
                    </div>
                    <div class="tm_pb_contact_field col-md-12 " style="padding-bottom: 10px;">
                        <input type="checkbox" name="pers" id="pers" checked>
                        <label for="pers">
                            Нажимая на кнопку, я даю свое согласие на <a href="{{route('pdf.pers')}}" class="contact-form__link"> обработку персональных данных</a> и соглашаюсь с условиями <a href="{{route('pdf.conf')}}" class="contact-form__link">политики конфиденциальности</a>
                        </label>
                    </div>
                </div>
                <div class="tm_contact_bottom_container category__footer">
                    <input type="hidden" name="theme" class="input__theme">
                    {{ csrf_field() }}
                    <button type="submit" class="tm_pb_button" style="max-width: 200px; margin-left: auto;margin-right: auto;display: block;">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>