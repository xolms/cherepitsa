<script type="text/javascript">
    jQuery('form').submit(function (e) {
        e.preventDefault();
        var form = jQuery(this);
        if (!form.hasClass('form__more')) {
            var button = form.find('.tm_pb_button');

            var pers = form.find('input[name=pers]');
            if(!pers.prop('checked')) {
                button.notify(
                    "Вы не соласились на обработку персональных данных, ваши данные не отправлены", 'error',
                    { position: "bottom center" }
                );
                return false;
            }
            var data = form.serialize();
            jQuery.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: data,
                success: function (response) {

                    console.log(response.status);
                    if(response.status == 'good') {
                        var scrf = jQuery('input[name=_token]').val();
                        form.find('input, textarea').val('');
                        form.find('input[name=_token]').val(scrf);
                        button.notify(
                            "Ваш запрос успешно отправлен", "success",
                            { position: "bottom center" }
                        );
                        setTimeout(function () {
                            jQuery('.modal').fadeOut();
                        }, 5000);

                    }

                },
                error: function (response) {
                    if(response.status === 422) {

                        var errors = response.responseJSON;

                        console.log(errors);
                        for (error in errors) {
                            if (error === 'message') {
                                button.notify(
                                    'Вы должны указать либо E-mail либо телефон, для доступа связи с вами' , 'error',
                                    { position: "bottom center" }
                                );
                            }
                            else {
                                var item = form.find('input[name='+error+']');
                                var names;
                                if(error == 'name') {
                                    names = 'Имя';
                                }
                                else if (error == 'phone') {
                                    names = 'Телефон';
                                }
                                else if (error == 'message') {
                                    names = 'Тексовое поле';
                                }
                                else if (error == 'mail') {
                                    names = 'E-mail';
                                }
                                button.notify(
                                    'Поле '+names+' заполненно не правильно' , 'error',
                                    { position: "bottom center" }
                                );
                            }

                        }
                    }
                }
            });
        }
        else {
            var data = form.serialize();
            jQuery.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: data,
                success: function (response) {
                    console.log(response.text);
                    jQuery('.text__wrap').html('');
                    jQuery('.text__wrap').html(response.text);
                    jQuery('.text__button').fadeOut();
                },
                error: function (response) {
                    if(response.status === 422) {

                        var errors = response.responseJSON;

                        console.log(errors);
                        for (error in errors) {
                            if (error === 'message') {
                                button.notify(
                                    'Вы должны указать либо E-mail либо телефон, для доступа связи с вами' , 'error',
                                    { position: "bottom center" }
                                );
                            }
                            else {
                                var item = form.find('input[name='+error+']');
                                var names;
                                if(error == 'name') {
                                    names = 'Имя';
                                }
                                else if (error == 'phone') {
                                    names = 'Телефон';
                                }
                                else if (error == 'message') {
                                    names = 'Тексовое поле';
                                }
                                else if (error == 'mail') {
                                    names = 'E-mail';
                                }
                                button.notify(
                                    'Поле '+names+' заполненно не правильно' , 'error',
                                    { position: "bottom center" }
                                );
                            }

                        }
                    }
                }
            });
        }
        return false;
    });
</script>