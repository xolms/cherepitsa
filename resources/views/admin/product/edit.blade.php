@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить {{$product->name}}</h3>
        </div>
        {{Form::open(array('route' => array('product.update', $product->id), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('alias', 'Alias вводить можно на русском языке с пробелами должно быть уникально')}}
                {{Form::text('alias', $product->alias , array('placeholder' => 'Alias', 'id' => 'alias', 'class' => 'form-control', 'maxlength' => '60', 'minlength' => '6'))}}
            </div>
            <div class="form-group">
                {{Form::label('name', 'Имя')}}
                {{Form::text('name', $product->name , array('placeholder' => 'Имя', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $product->title , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $product->description , array('placeholder' => 'Description', 'id' => 'description', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'Цена')}}
                {{Form::text('price', $product->price , array('placeholder' => 'Цена', 'id' => 'price', 'class' => 'form-control'))}}
            </div>

            <div class="form-group">
                <label>Категория: {{$product->category->name}}</label>
            </div>
            <div class="form-group">
                <label>Производитель</label>
                <select class="form-control" name="maker_id">
                    @foreach($category->maker as $item)

                        <option value='{{$item->id}}' {{$item->id == $product->category_id ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
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
                    {{Form::text('data['.$item->name.']', $product->data[$item->name] , array('placeholder' => $item->name_rus, 'id' => $item->name, 'class' => 'form-control', $item->required == 1 ? 'required' : ''))}}
                </div>
            @endforeach
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Изображения</h3>
                </div>
                <div class="box-body pad">
                    <div class="row">
                        @foreach($product->images as $item)
                            <div class="col-md-2 col-sm-3" style="position: relative;">
                                <img src="{{$item->img}}" alt="{{$item->alt}}" style="width: 100%;">
                                <button class="btn btn-danger btn-sm delete-img" data-token="{{csrf_token()}}" data-route="{{route('productimg.delete')}}" style="position: absolute;top: 10px;right: 20px;"  data-id="{{$item->id}}">Удалить</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Добавить изображения</h3>
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
                    {{Form::textarea('text', $product->text , array('id' => 'textarea', 'class' => 'textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'))}}
                </div>
            </div>


            <div class="box-footer">
            {{Form::submit('Обновить', array('class' => 'btn btn-primary')) }}
            {{Form::close()}}



        </div>
        <!-- /.box-body -->

        </form>
    </div>
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

    $('.delete-img').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('data-route');
        var id = $(this).attr('data-id');
        var vm = $(this);
        var token = $(this).attr('data-token');
        jQuery.ajax({
            type: 'POST',
            url: route,
            data: {
                id: id,
                _token: token
            },
            success: function (response) {
                console.log(response);
                if(response.status == 1) {
                    vm.parent().remove();
                    $.notify(response.message, 'success', {position:'top center'});
                }
            },
            error: function (response) {
                console.log(response);
            }
        })
        return false;
    })
    </script>
@endsection