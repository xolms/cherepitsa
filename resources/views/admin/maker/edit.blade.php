@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить {{$maker->name}}</h3>
        </div>
        {{Form::open(array('route' => array('maker.update', $maker->id), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('alias', 'Alias вводить можно на русском языке с пробелами должно быть уникально')}}
                {{Form::text('alias', $maker->alias , array('placeholder' => 'Alias', 'id' => 'alias', 'class' => 'form-control', 'maxlength' => '60', 'minlength' => '6'))}}
            </div>
            <div class="form-group">
                {{Form::label('name', 'Имя категории')}}
                {{Form::text('name', $maker->name , array('placeholder' => 'Имя категории', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $maker->title, array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $maker->description , array('placeholder' => 'Description', 'id' => 'title', 'class' => 'form-control'))}}
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