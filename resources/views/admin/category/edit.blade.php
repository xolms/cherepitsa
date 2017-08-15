@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить {{$category->name}}</h3>
        </div>
        {{Form::open(array('route' => array('category.update', $category->id), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('alias', 'Alias вводить можно на русском языке с пробелами должно быть уникально')}}
                {{Form::text('alias', $category->alias , array('placeholder' => 'Alias', 'id' => 'alias', 'class' => 'form-control', 'maxlength' => '60', 'minlength' => '6'))}}
            </div>
            <div class="form-group">
                {{Form::label('name', 'Имя категории')}}
                {{Form::text('name', $category->name , array('placeholder' => 'Имя категории', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $category->title, array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $category->description , array('placeholder' => 'Description', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('min_price', 'Минимальная цена')}}
                {{Form::text('min_price', $category->min_price , array('placeholder' => 'Минимальная цена', 'id' => 'min_price', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Изображение')}}
                {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="montage" {{$category->montage == 1 ? 'checked' : ''}} >
                    Монтаж
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="leaves" {{$category->leaves == 1 ? 'checked' : ''}}>
                    Доставка
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="garant" {{$category->garant == 1 ? 'checked' : ''}}>
                    Гаратния
                </label>
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