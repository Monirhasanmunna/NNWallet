@if ($paginator->hasPages())
    <nav role="navigation" class="flex items-center justify-between mt-4">

        {{-- Info Text --}}
        <p class="text-sm text-gray-600">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}
            of {{ $paginator->total() }} results
        </p>

        {{-- Pagination --}}
        <ul class="flex items-center gap-1">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="w-8 h-8 flex items-center justify-center
                             border border-gray-300 bg-gray-100 text-gray-400 rounded
                             cursor-not-allowed text-xs">
                    ‹
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="w-8 h-8 flex items-center justify-center
                          border border-blue-500 bg-gray-50 text-blue-600 rounded
                          hover:bg-blue-50 text-xs">
                    ‹
                </a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="w-8 h-8 flex items-center justify-center
                                 border border-gray-300 bg-gray-100 text-gray-500 rounded text-xs">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="w-8 h-8 flex items-center justify-center
                                         bg-blue-600 text-white border border-blue-600 rounded text-xs font-semibold">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="w-8 h-8 flex items-center justify-center
                                      border border-blue-500 bg-gray-50 text-blue-600 rounded
                                      hover:bg-blue-100 text-xs">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="w-8 h-8 flex items-center justify-center
                          border border-blue-500 bg-gray-50 text-blue-600 rounded
                          hover:bg-blue-50 text-xs">
                    ›
                </a>
            @else
                <span class="w-8 h-8 flex items-center justify-center
                             border border-gray-300 bg-gray-100 text-gray-400 rounded
                             cursor-not-allowed text-xs">
                    ›
                </span>
            @endif

        </ul>
    </nav>
@endif
