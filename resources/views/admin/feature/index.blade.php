@extends('layouts.admin')
@section('content')
    <a href="{{route('feature.create')}}" class="btn btn-lg btn-success  btn-lg">Добавить</a>
    <a href="{{route('feature.position.get')}}" class="btn btn-lg btn-success  btn-lg">Изменение позиций</a>
    @if(isset($fea))
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Список</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-personal" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Единица измерения</th>
                                    <th>Вывод в каталоге</th>
                                    <th>Обязательно для заполения</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fea as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$item->name_rus}}</td>
                                        <td style="vertical-align: middle;">{{$item->unit}}</td>
                                        <td style="vertical-align: middle;">{{$item->index == '1' ? 'Да' : 'Нет'}}</td>
                                        <td style="vertical-align: middle;">{{$item->required == '1' ? 'Да' : 'Нет'}}</td>
                                        <td style="vertical-align: middle; text-align: center;">
                                            <a href="{{route('feature.edit',$item->id)}}" class="btn btn-warning btn-sm">Редактировать</a>
                                            <form action="{{route('feature.destroy', $item->id)}}" method="post" style="display: inline-block;">
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