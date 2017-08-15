@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'category.store', 'files' => true))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('alias', 'Alias вводить можно на русском языке с пробелами должно быть уникально')}}
                {{Form::text('alias', '' , array('placeholder' => 'Alias', 'id' => 'alias', 'class' => 'form-control', 'maxlength' => '60', 'minlength' => '6'))}}
            </div>
            <div class="form-group">
                {{Form::label('name', 'Имя категории')}}
                {{Form::text('name', '' , array('placeholder' => 'Имя категории', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '' , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '' , array('placeholder' => 'Description', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('min_price', 'Минимальная цена')}}
                {{Form::text('min_price', '' , array('placeholder' => 'Минимальная цена', 'id' => 'min_price', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Изображение')}}
                {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="montage">
                    Монтаж
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="leaves">
                    Доставка
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="garant">
                    Гаратния
                </label>
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