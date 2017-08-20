@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить слайдер {{$slider->id}}</h3>
        </div>
        {{Form::open(array('route' => (['slider.update', $slider->id]), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('title', 'Заголовок')}}
                {{Form::text('title', $slider->title , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('bg', 'Изображение')}}
                {{Form::file('bg', '' , array('id' => 'bg', 'class' => 'form-control'))}}
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