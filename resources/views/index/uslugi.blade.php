<section class="portfolio">
    <div class="container" style="width: 90%; min-width: 320px; padding: 0 20px;">
        <div class="row">
            <h2 class="home-title">
                <span class="wrap-1">Наши </span>
                <span class="wrap-2">Услуги </span>
            </h2>
        </div>
        <div class="row no-gutter">
            <div id="foliowrap">
                @foreach($usluga as $item)
                    <figure class="foliobox building">
                        <img src="{{$item->bg}}" alt="{{$item->name}}">
                        <div class="project-title">
                            {{$item->name}}
                        </div>
                        <figcaption>
                            <span class="folcat">{{$item->small_text}}</span>
                            <h3 class="foltitle">{{$item->name}}</h3>
                            <a href="{{route('usluga.item', $item->alias)}}" class="goto">Подробнее</a>
                        </figcaption>
                    </figure><!-- end foliobox -->
                @endforeach


            </div><!-- end #foliowrap -->

            <div class="contact-hero">
                <div class="pull-left">
                    <p>Отправьте свои данные и мы с вами свяжемся!</p>
                </div>
                <div class="pull-right">
                    <button class="modal__click btn btn-lg btn-default"  data-title="Заказать услугу" data-textarea="Укажите дополнительную информацию" data-theme="Заказать услугу" data-link="{{route('form.usluga')}}">Заказать услугу</button>

                </div>
            </div><!-- end contact-hero -->

        </div><!-- end row -->
    </div>

</section><!-- end portfolio -->