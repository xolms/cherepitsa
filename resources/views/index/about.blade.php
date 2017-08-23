<section class="home-about">
    <div class="container">
        <div class="row">
            <div class="about-text" style="width: 100%;">
                <h3 class="home-title">{{$about->title}}</h3>
                <p class="trigger animated fadeInUp">{!! $about->text_index !!}</p>

                <a class="btn btn-default" href="{{route('about.index')}}">Подробнее о нас</a>
            </div><!-- end column -->
        </div><!-- end row -->
    </div>
</section><!-- end about -->