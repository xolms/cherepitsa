@foreach($usluga as $k => $item)
    <div id="projects-term-{{$k}}" class="projects-terms-item projects-item-instance cherry-animation-item simple-fade-hover item-{{$k+1}} odd" style="flex-basis: 50%; width: 50%; margin-bottom: 0px;">


        <div class="inner-wrapper" style="margin: 0px;">
            <div class="project-terms-media terms-grid-skin1">
                <div class="project-terms-media-front">
                    <figure class="featured-image"><a href="{{$item->bg}}" class="term-img"><span class="cover"></span><img src="{{$item->bg}}" alt="{{$item->name}}" width="100%"></a></figure>
                    <div class="hover-content column-format invert">
                        <h5><a href="{{route('usluga.item', $item->alias)}}" title="{{$item->name}}">{{$item->name}}</a></h5>
                    </div>
                </div>
                <div class="project-terms-media-back">
                    <figure class="featured-image"><a href="{{$item->bg}}" class="term-img"><span class="cover"></span><img src="{{$item->bg}}" alt="{{$item->name}}" width="100%"></a></figure>
                    <div class="hover-content column-format invert">
                        <h5><a href="{{route('usluga.item', $item->alias)}}" title="{{$item->name}}">{{$item->name}}</a></h5>
                        <div class="tm_builder_outer_content" id="tm_builder_outer_content">
                            <div class="tm_builder_inner_content tm_pb_gutters3">
                                <p>{{$item->small_text}}</p>
                            </div>
                        </div>
                        <a class="term-permalink simple-icon" href="{{route('usluga.item', $item->alias)}}"><span>Подробнее</span></a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endforeach