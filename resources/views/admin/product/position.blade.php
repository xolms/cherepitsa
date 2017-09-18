@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Добавить</h3>
        </div>
        {{Form::open(array('route' => array('position.post', $id), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            @foreach($product as $item)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{$item->img}}" alt="{{$item->alt}}" style="width: 100%;">
                        </div>
                        <div class="col-md-9">
                            <label for="">
                                <input type="radio" name="position" value="{{$item->id}}" {{$item->index == 1 ? 'checked' : ''}}>
                                <b>Выводится в каталоге</b>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach









        </div>
        <div class="box-footer">
            {{Form::submit('Изменить картинку каталога', array('class' => 'btn btn-primary')) }}
            {{Form::close()}}



        </div>
        <!-- /.box-body -->

        </form>
    </div>
@endsection
@section('script')
    <script>
    </script>
@endsection