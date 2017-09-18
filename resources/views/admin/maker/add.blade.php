@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'maker.store', 'files' => true))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('name', 'Имя производителя')}}
                {{Form::text('name', '' , array('placeholder' => 'Имя производителя', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '' , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '' , array('placeholder' => 'Description', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('country', 'Страна')}}
                {{Form::text('country', '' , array('placeholder' => 'Страна', 'id' => 'country', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                <label>Категории (массовый выбор делать через зажатый контрл)</label>
                <select class="form-control" name="category_id[]" multiple>
                    @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Текст
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    {{Form::textarea('text', '' , array('id' => 'textarea', 'class' => 'textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'))}}
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