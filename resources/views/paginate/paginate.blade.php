@if ($paginator->hasPages())
    <nav class="navigation pagination" role="navigation">
        <h2 class="screen-reader-text">Пагинация</h2>
        <div class="nav-links">
            @foreach ($elements as $element)
                @if (is_string($element))

                        <span class="page-numbers current">{{$element}}</span>

                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                                <span class="page-numbers current">{{$page}}</span>

                        @else

                                <a class="page-numbers" href="{{$url}}">{{$page}}</a>

                        @endif
                    @endforeach
                @endif
            @endforeach

        </div>
    </nav>
@endif

