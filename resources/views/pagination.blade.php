@if ($paginator->hasPages())
<ul class="pagination pagination_style1 justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
        @else
            <li class="page-item"><a class="page-link" rel="prev" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            {{--<li class="disabled"><span>{{ $element }}</span></li>--}}
                <li class="page-item"><a class="page-link">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a rel="next" class="page-link" href="{{ $paginator->nextPageUrl() }}">NEXT</a></li>
        @else
            <li class="page-item disabled"><a class="page-link">NEXT</a></li>
        @endif
    </ul>
@endif
