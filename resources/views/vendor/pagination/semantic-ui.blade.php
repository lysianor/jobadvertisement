@if ($paginator->hasPages())
    <nav class="navigation" >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="puzzle-icon fal fa-angle-double-left"></i> </a>
        @else
            <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="puzzle-icon fal fa-angle-double-left"></i> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="page-numbers disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-numbers current" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="puzzle-icon fal fa-angle-double-right"></i> </a>
        @else
            <a class="page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="puzzle-icon fal fa-angle-double-right"></i> </a>
        @endif
    </nav>
@endif
