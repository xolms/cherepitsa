<div class="testimonial">
    <div class="container">
        <div class="row">
            <div id="testimonial-home" class="carousel slide">
                <ol class="carousel-indicators">
                    @foreach($rev as $k => $item)
                        <li data-target="#testimonial-home" data-slide-to="{{$k}}" class="{{$k == 0 ? 'active' : ''}}"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach($rev as $k => $item)
                        <div class="item {{$k == 0 ? 'active' : ''}}">
                            <figure class="ava">
                                <img src="{{$item->img}}" alt="{{$item->name}}">
                            </figure>
                            <div class="context">
                                <div class="inner">
                                    <blockquote>{{$item->text}}</blockquote>
                                    <p class="who">{{$item->name}}</p>
                                </div>
                            </div>
                        </div><!-- end item -->
                    @endforeach
                </div><!-- end carousel-inner -->

                <a class="left carousel-control" href="#testimonial-home" role="button" data-slide="prev">
                    <span class="fa fa-fw fa-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#testimonial-home" role="button" data-slide="next">
                    <span class="fa fa-fw fa-chevron-right"></span>
                </a>

            </div><!-- end carousel -->
        </div><!-- end row -->
    </div>
</div><!-- end testimonial -->