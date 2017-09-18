@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Изменить порядок</h3>
        </div>
        {{Form::open(array('route' => 'feature.position.post', 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <ul class="sort" style="list-style-type: none;">
                @foreach($fea as $k=>$item)
                    <li style="background-color: #fff;border: 1px solid #000;height: 40px;line-height: 40px;padding-left: 20px;" id="{{$k+1}}">{{$item->name_rus}}</li>
                @endforeach
            </ul>
        </div>
        <div class="box-footer">
            <input type="hidden" name="position" value="{{$pos}}" class="pos">
            {{Form::submit('Изменить порядок', array('class' => 'btn btn-primary')) }}
            {{Form::close()}}



        </div>
        <!-- /.box-body -->

        </form>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('.sort').sortable({
                update: function(event, ui) {
                    var productOrder = $(this).sortable('toArray').toString();
                    console.log(productOrder);
                    $(".pos").val(productOrder);
                }
            });
        });
    </script>
@endsection

