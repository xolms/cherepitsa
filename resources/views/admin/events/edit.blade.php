@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить акцию</h3>
        </div>
        {{Form::open(array('route' => ['events.update' , $event->id] , 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('title', 'Заголовок')}}
                {{Form::text('title', $event->title, array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('date_end', 'Время окончания')}}
                {{Form::text('date_end', $event->date_end , array('id' => 'date_end datepicker', 'class' => 'form-control input__time'))}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Изображение')}}
                {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('text', 'Текст')}}
                {{Form::textarea('text', $event->text , array('id' => 'text', 'class' => 'form-control', 'rows' => '4'))}}
            </div>


        </div>
        <div class="box-footer">
            {{Form::submit('Обновить акцию', array('class' => 'btn btn-primary')) }}
            {{Form::close()}}



        </div>
        <!-- /.box-body -->

        </form>
    </div>
@endsection