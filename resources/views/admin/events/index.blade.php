@extends('layouts.admin')
@section('content')
    <a href="{{route('events.create')}}" class="btn btn-lg btn-success  btn-lg">Добавить</a>
    <form action="{{route('events.all')}}" method="post" style="display: inline-block;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" value="{{URL::current()}}" name="url">
        <button type="submit" class="btn btn-danger  btn-lg">Удалить прошедшие</button>
    </form>
    @if(!empty($events))
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Список акций</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-personal" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Название</th>
                                    <th>Изображение</th>
                                    <th>Дата окончания</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$item->title}}</td>
                                        <td style="vertical-align: middle;">
                                            <img src="{{$item->img}}" alt="{{$item->title}}" style="width: 200px;height: auto;">
                                        </td>
                                        <td style="vertical-align: middle;">{{$item->date_end}}</td>


                                        <td style="vertical-align: middle; text-align: center;">
                                            <a href="{{route('events.edit',$item->id)}}" class="btn btn-warning btn-sm">Редактировать</a>
                                            <form action="{{route('events.destroy', $item->id)}}" method="post" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input type="hidden" value="{{URL::current()}}" name="url">
                                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                            </form>
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
        <h2>У вас на данный момент нет акций</h2>
    @endif



@endsection