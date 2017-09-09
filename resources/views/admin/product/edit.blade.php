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
                {{Form::label('type', 'Тип')}}
                {{Form::text('type', $product->type , array('placeholder' => 'Тип', 'id' => 'type', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('color', 'Цвет')}}
                {{Form::text('color', $product->color , array('placeholder' => 'Цвет', 'id' => 'color', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'Цена')}}
                {{Form::text('price', $product->price , array('placeholder' => 'Цена', 'id' => 'price', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('marking', 'Страна изготовитель(если не указывать возьметься страна производителя)')}}
                {{Form::text('marking', $product->marking , array('placeholder' => 'Страна изготовитель(если не указывать возьметься страна производителя)', 'id' => 'marking', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('weight', 'Вес')}}
                {{Form::text('weight', $product->weight , array('placeholder' => 'Вес', 'id' => 'weight', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('picture', 'Рисунок')}}
                {{Form::text('picture', $product->picture , array('placeholder' => 'Рисунок', 'id' => 'picture', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Изображение')}}
                {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
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
            </script>
@endsection