@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'slider.store', 'files' => true))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('title', 'Заголовок')}}
                {{Form::text('title', '' , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('button_name', 'Надпись на кнопке(не обязательно)')}}
                {{Form::text('button_name', '' , array('placeholder' => 'Надпись на кнопке(не обязательно)', 'id' => 'button_name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('alias', 'Ссылка для кнопки(не обязательно)')}}
                {{Form::text('alias', '' , array('placeholder' => 'Ссылка для кнопки(не обязательно)', 'id' => 'alias', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('bg', 'Изображение')}}
                {{Form::file('bg', '' , array('id' => 'bg', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('text', 'Текст')}}
                {{Form::textarea('text', '' , array('id' => 'text', 'class' => 'form-control', 'rows' => '4'))}}
            </div>

        </div>
        <div class="box-footer">
            {{Form::submit('Добавить услугу', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}



    </div>
    <!-- /.box-body -->

    </form>
    </div>
@endsection