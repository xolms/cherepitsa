@extends('layouts.admin')
@section('content')
    <a href="{{route('category.create')}}" class="btn btn-lg btn-success  btn-lg">Добавить категорию</a>
    @if(isset($category))
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Список категорий</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-personal" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Alias</th>
                                    <th>Название</th>
                                    <th>Заголовок</th>
                                    <th>Description</th>
                                    <th>Изображение</th>
                                    <th>Кол-во производителей</th>
                                    <th>Кол-во товаров</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$item->alias}}</td>
                                        <td style="vertical-align: middle;">{{$item->name}}</td>
                                        <td style="vertical-align: middle;">{{$item->title}}</td>
                                        <td style="vertical-align: middle;">{{$item->description}}</td>

                                        <td style="vertical-align: middle;">
                                            <img src="{{$item->img}}" alt="{{$item->name}}" style="width: 200px; height: auto;">
                                        </td>
                                        <td style="vertical-align: middle;">{{count($item->maker)}}</td>
                                        <td style="vertical-align: middle;">{{count($item->product)}}</td>
                                        <td style="vertical-align: middle; text-align: center;">
                                            <a href="{{route('category.edit',$item->id)}}" class="btn btn-warning btn-sm">Редактировать</a>
                                            <form action="{{route('category.destroy', $item->id)}}" method="post" style="display: inline-block;">
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
        <h2>У вас на данный момент нет услуг</h2>
    @endif



@endsection