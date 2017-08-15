@extends('layouts.admin')
@section('content')
    <a href="{{route('review.create')}}" class="btn btn-lg btn-success  btn-lg">Добавить отзыв</a>
    @if(isset($rev))
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Список отзывов</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-personal" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Текст</th>
                                    <th>Фотография</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rev as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$item->name}}</td>
                                        <td style="vertical-align: middle;">{{$item->text}}</td>
                                        <td style="vertical-align: middle;">
                                            @if(isset($item->img))
                                                <img src="{{$item->img}}" alt="{{$item->name}}" style="width: 200px;">
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">{{$item->created_at}}</td>
                                        <td style="vertical-align: middle; text-align: center;">

                                            <a href="{{route('review.edit',$item->id)}}" class="btn btn-warning btn-sm">Редактировать</a>
                                            <form action="{{route('review.destroy', $item->id)}}" method="post" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input type="hidden" value="{{URL::current()}}" name="url">
                                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                            </form>
                                            @if($item->status == 0)
                                                <form action="{{route('review.status', $item->id)}}" method="post" style="display: inline-block;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="status" value="1">
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    <input type="hidden" value="{{URL::current()}}" name="url">
                                                    <button type="submit" class="btn btn-success btn-sm">Отображать</button>
                                                </form>
                                            @else
                                                <form action="{{route('review.status', $item->id)}}" method="post" style="display: inline-block;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="status" value="0">
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    <input type="hidden" value="{{URL::current()}}" name="url">
                                                    <button type="submit" class="btn btn-danger btn-sm">Не отображать</button>
                                                </form>
                                            @endif
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
        <h2>У вас на данный момент нет услуг</h2>
    @endif



@endsection