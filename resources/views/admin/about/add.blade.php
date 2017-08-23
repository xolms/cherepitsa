@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => 'about.post', 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('title', 'Заголовок')}}
                {{Form::text('title', $about->title , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $about->description , array('placeholder' => 'Description', 'id' => 'description', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Изображение')}}
                {{Form::file('img', '' , array('id' => 'img', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('text_index', 'Текст для главной')}}
                {{Form::textarea('text_index', $about->text_index , array('id' => 'text_index', 'class' => 'form-control', 'rows' => '4'))}}
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
                    {{Form::textarea('text', $about->text , array('id' => 'textarea', 'class' => 'textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'))}}
                </div>
            </div>


        </div>
        <div class="box-footer">
            {{Form::submit('Изменить', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}



    </div>
    <!-- /.box-body -->

    </form>
    </div>
@endsection