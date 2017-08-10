@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить {{$setting->name_rus}}</h3>
        </div>
        {{Form::open(array('route' => (['setting.update', $setting->id]),  'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('value', 'Значение')}}
                {{Form::text('value', $setting->value , array('placeholder' => 'Значение', 'id' => 'value', 'class' => 'form-control'))}}
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