@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить {{$rev->name}}</h3>
        </div>
        {{Form::open(array('route' => array('review.update', $rev->id), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="box-body">

                <div class="form-group">
                    {{Form::label('name', 'Имя')}}
                    {{Form::text('name', $rev->name , array('placeholder' => 'Имя', 'id' => 'name', 'class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('img', 'Фотография')}}
                    {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('text', 'Текст')}}
                    {{Form::textarea('text', $rev->text , array('id' => 'text', 'class' => 'form-control', 'rows' => '4'))}}
                </div>


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