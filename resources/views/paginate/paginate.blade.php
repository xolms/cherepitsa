@if ($paginator->hasPages())
    <div class="page-wrap">
        <ul class="pagination pagination-sm">
            @foreach ($elements as $element)
                @if (is_string($element))

                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <li class="active"><a href="{{$url}}">{{$page}}<span class="sr-only">{{$page}}</span></a></li>

                        @else
                                <li><a href="{{$url}}">{{$page}}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>
    </div><!-- end page-wrap -->

@endif
