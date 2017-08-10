@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'setting.store'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('name_rus', 'Название')}}
                {{Form::text('name_rus', '' , array('placeholder' => 'Название', 'id' => 'name_rus', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('value', 'Значение')}}
                {{Form::text('value', '' , array('placeholder' => 'Значение', 'id' => 'value', 'class' => 'form-control'))}}
            </div>


        </div>
        <div class="box-footer">
            {{Form::submit('Добавить настройку', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}



    </div>
    <!-- /.box-body -->

    </form>
    </div>
@endsection