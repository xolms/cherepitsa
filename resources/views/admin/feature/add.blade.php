@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'feature.store', 'files' => true))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('name', 'Название')}}
                {{Form::text('name', '' , array('placeholder' => 'Название', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('unit', 'Единица измерения')}}
                {{Form::text('unit', '' , array('placeholder' => 'Единица измерения', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="index" > Выводить в каталог
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="required" > Обязательно для заполнения
                    </label>
                </div>
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

