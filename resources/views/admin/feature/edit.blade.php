@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить {{$fea->name_rus}}</h3>
        </div>
        {{Form::open(array('route' => array('feature.update', $fea->id), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('unit', 'Единица измерения')}}
                {{Form::text('unit', $fea->unit , array('placeholder' => 'Единица измерения', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="index" {{$fea->index == '1' ? 'checked' : ''}}> Выводить в каталог
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="required" {{$fea->required == '1' ? 'checked' : ''}}> Обязательно для заполнения
                    </label>
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

