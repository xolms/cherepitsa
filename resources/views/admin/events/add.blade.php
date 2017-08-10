@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'events.store', 'files' => true))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('title', 'Заголовок')}}
                {{Form::text('title', '' , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('date_end', 'Время окончания')}}
                {{Form::text('date_end', '' , array('id' => 'date_end datepicker', 'class' => 'form-control input__time'))}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Изображение')}}
                {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('text', 'Текст')}}
                {{Form::textarea('text', '' , array('id' => 'text', 'class' => 'form-control', 'rows' => '4'))}}
            </div>


        </div>
        <div class="box-footer">
            {{Form::submit('Добавить акцию', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}



    </div>
    <!-- /.box-body -->

    </form>
    </div>
@endsection