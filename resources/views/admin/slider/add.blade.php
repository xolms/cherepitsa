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
                {{Form::label('bg', 'Изображение')}}
                {{Form::file('bg', '' , array('id' => 'bg', 'class' => 'form-control'))}}
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