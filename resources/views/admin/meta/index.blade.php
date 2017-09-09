@extends('layouts.admin')
@section('content')

    @if(isset($meta))
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

                                    <th>Название</th>
                                    <th>Заголовок</th>
                                    <th>Description</th>
                                    <th>Keywords</th>

                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($meta as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$item->name}}</td>
                                        <td style="vertical-align: middle;">{{$item->title}}</td>
                                        <td style="vertical-align: middle;">{{$item->description}}</td>
                                        <td style="vertical-align: middle;">{{$item->keywords}}</td>


                                        <td style="vertical-align: middle; text-align: center;">
                                            <a href="{{route('meta.edit',$item->id)}}" class="btn btn-warning btn-sm">Редактировать</a>
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