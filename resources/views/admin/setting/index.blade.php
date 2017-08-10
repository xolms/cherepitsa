@extends('layouts.admin')
@section('content')
    <a href="{{route('setting.create')}}" class="btn btn-lg btn-success  btn-lg">Добавить</a>
    @if(isset($setting))
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Список слайдов</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-personal" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Название</th>
                                    <th>Значение</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($setting as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$item->name_rus}}</td>
                                        <td style="vertical-align: middle;">{{$item->value}}</td>
                                        <td style="vertical-align: middle;">{{$item->button_name}}</td>


                                        <td style="vertical-align: middle; text-align: center;">
                                            <a href="{{route('setting.edit',$item->id)}}" class="btn btn-warning btn-sm">Редактировать</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <h2>У вас на данный момент нет настроек</h2>
    @endif



@endsection