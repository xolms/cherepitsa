@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'product.store', 'files' => true))}}
        <div class="box-body">

            <div class="form-group">
                {{Form::label('alias', 'Alias вводить можно на русском языке с пробелами должно быть уникально')}}
                {{Form::text('alias', '' , array('placeholder' => 'Alias', 'id' => 'alias', 'class' => 'form-control', 'maxlength' => '60', 'minlength' => '2'))}}
            </div>
            <div class="form-group">
                {{Form::label('name', 'Имя')}}
                {{Form::text('name', '' , array('placeholder' => 'Имя', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '' , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '' , array('placeholder' => 'Description', 'id' => 'description', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'Цена')}}
                {{Form::text('price', '' , array('placeholder' => 'Цена', 'id' => 'price', 'class' => 'form-control'))}}
            </div>

            <div class="form-group">
                <label>Категории</label>
                <select class="form-control" name="category_id" data-route="{{route('product.ajax')}}">
                    <option value="0" disabled selected>Выберите категорию</option>
                    @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label>Производитель</label>
                <select class="form-control" name="maker_id">
                    <option value="0" disabled>Сначала выберете категорию</option>
                </select>
            </div>
            @foreach($fea as $item)
                @if($item->required == 1)
                    <?php $bool = '(Обязательно для заполения)' ?>
                @else
                    <?php $bool = '' ?>
                @endif
                <div class="form-group">
                    {{Form::label($item->name, $item->name_rus.''.$bool )}}
                    {{Form::text('data['.$item->name.']', '' , array('placeholder' => $item->name_rus, 'id' => $item->name, 'class' => 'form-control', $item->required == 1 ? 'required' : ''))}}
                </div>
            @endforeach
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Изображения</h3>
                </div>
                <div class="box-body pad">
                    <div class="form-img">
                        <div class="form-group form-images" id="0">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    {{Form::label('', 'Изображение')}}
                                    {{Form::file('img[]', '' , array('class' => 'form-control'))}}
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    {{Form::label('', 'Alt')}}
                                    {{Form::text('alt[]', '' , array('placeholder' => 'Alt', 'class' => 'form-control', 'maxlength' => '60', 'minlength' => '2'))}}
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    {{Form::label('', 'Цвет')}}
                                    {{Form::color('color[]', '' , array('placeholder' => 'Цвет', 'class' => 'form-control', 'maxlength' => '60'))}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary add-img">Добавить изображение</button>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Текст
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    {{Form::textarea('text', '' , array('id' => 'textarea', 'class' => 'textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'))}}
                </div>
            </div>



        </div>
        <div class="box-footer">
            {{Form::submit('Добавить', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}



    </div>
    <!-- /.box-body -->

    </form>
    </div>
@endsection
@section('script')
    <script>
        $('select[name=category_id]').change(function () {
           var select = $(this);
           var data = select.serialize();
            jQuery.ajax({
                type: 'POST',
                url: select.attr('data-route'),
                data: data,
                success: function (response) {
                    console.log(response);
                    $('select[name=maker_id]').html(response);
                },
                error: function (response) {
                    console.log(response);
                }

            });
        });
    var column = 0;
    $('.add-img').click(function (e) {
        e.preventDefault();
        addcolumn();
        return false;
    })
    function addcolumn() {

        column++;
        var html = "\
            <div class=\"form-group form-images\" id="+column+">\
                <div class=\"row\"><div class=\"col-md-3 col-sm-6\">\
                    <label>Изображение</label>\
                    <input type=\"file\" name=\'img[]\'>\
                </div>\
                <div class=\"col-md-3 col-sm-6\">\
                    <label>Alt</label>\
                    <input placeholder=\"Alt\" class=\"form-control\" maxlength=\"60\" minlength=\"2\" name=\"alt[]\" value=\"\" type=\"text\">\
                </div>\
                <div class=\"col-md-3 col-sm-6\">\
                    <label>Цвет</label>\
                    <input placeholder=\"Цвет\" class=\"form-control\"  name=\"color[]\" value=\"\" type=\"color\">\
                </div>\
            </div>\
            "
        $('.form-img').append(html);
    }
    </script>
@endsection