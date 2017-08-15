@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'review.store', 'files' => true))}}
        <div class="box-body">

            <div class="form-group">
                {{Form::label('name', 'Имя')}}
                {{Form::text('name', '' , array('placeholder' => 'Имя', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Фотография')}}
                {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('text', 'Текст')}}
                {{Form::textarea('text', '' , array('id' => 'text', 'class' => 'form-control', 'rows' => '4'))}}
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