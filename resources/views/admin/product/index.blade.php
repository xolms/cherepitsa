@extends('layouts.admin')
@section('content')
    <a href="{{route('product.create')}}" class="btn btn-lg btn-success  btn-lg">Добавить продукт</a>
    @if(isset($product))
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Список продукции</h3>
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
                                    <th>Производитель</th>
                                    <th>Изображение</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$item->alias}}</td>
                                        <td style="vertical-align: middle;">{{$item->name}}</td>
                                        <td style="vertical-align: middle;">{{$item->title}}</td>
                                        <td style="vertical-align: middle;">{{$item->description}}</td>
                                        <td>{{$item->makers->name}}</td>
                                        <td style="vertical-align: middle;">
                                            <img src="{{$item->img}}" alt="{{$item->name}}" style="width: 200px; height: auto;">
                                        </td>
                                        <td style="vertical-align: middle; text-align: center;">
                                            <a href="{{route('product.edit',$item->id)}}" class="btn btn-warning btn-sm">Редактировать</a>
                                            <form action="{{route('product.destroy', $item->id)}}" method="post" style="display: inline-block;">
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