<div id="carousel-home" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($slider as $k => $item)

            <li data-target="#carousel-home" data-slide-to="{{$k}}" class="{{$k == 0 ? 'active' : ''}}"></li>

        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($slider as $k => $item)
        <div class="item {{$k == 0 ? 'active' : ''}}">
            <img src="{{$item->bg}}" alt="">
            <div class="carousel-caption">
                @if($k == 0)
                <h1>{!! $item->title !!}</h1>
                @else
                <h2>{!! $item->title !!}</h2>
                @endif
            </div>
        </div>
        @endforeach
    </div><!-- end carousel inner -->

    <!-- Controls -->

    <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
        <span class="fa fa-fw fa-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
        <span class="fa fa-fw fa-chevron-right"></span>
    </a>

</div> <!-- Carousel -->