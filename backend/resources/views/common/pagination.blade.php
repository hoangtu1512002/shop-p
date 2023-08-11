    <ul class="pagination-list flex mb-[0] bg-[#fff] ml-[10px] rounded-[4px] px-[10px]">
        <li class="pagination-item py-[10px] px-[4px]">
            @if ($paginator->onFirstPage())
                <a
                    class="pagination-link block py-[2px] px-[8px] border text-[#ff443d] border-[#ff443d] rounded-[4px] hover:text-[#fff] hover:bg-[#ff443d] ease-in-out duration-300 cursor-pointer"><i
                        class="ti ti-arrow-narrow-left"></i>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="pagination-link block py-[2px] px-[8px] border text-[#ff443d] border-[#ff443d] rounded-[4px] hover:text-[#fff] hover:bg-[#ff443d] ease-in-out duration-300 cursor-pointer"><i
                        class="ti ti-arrow-narrow-left"></i>
                </a>
            @endif
        </li>

        @php
            $maxLinks = 5;
            $halfMaxLinks = floor($maxLinks / 2);
            $startPage = max($paginator->currentPage() - $halfMaxLinks, 1);
            $endPage = min($startPage + $maxLinks - 1, $paginator->lastPage());
        @endphp

        @for ($page = $startPage; $page <= $endPage; $page++)
            <li class="pagination-item py-[10px] px-[4px]">
                <a href="{{ $paginator->url($page) }}"
                    class="pagination-link block py-[2px] px-[8px] border text-[#ff443d] border-[#ff443d] rounded-[4px] hover:text-[#fff] hover:bg-[#ff443d] ease-in-out duration-300 {{ $page == $paginator->currentPage() ? 'bg-[#ff443d] text-[#fff]' : '' }}">{{ $page }}</a>
            </li>
        @endfor

        <li class="pagination-item py-[10px] px-[4px]">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="pagination-link block py-[2px] px-[8px] border text-[#ff443d] border-[#ff443d] rounded-[4px] hover:text-[#fff] hover:bg-[#ff443d] ease-in-out duration-300 cursor-pointer"><i
                        class="ti ti-arrow-narrow-right"></i>
                </a>
            @else
                <a
                    class="pagination-link block py-[2px] px-[8px] border text-[#ff443d] border-[#ff443d] rounded-[4px] hover:text-[#fff] hover:bg-[#ff443d] ease-in-out duration-300 cursor-pointer"><i
                        class="ti ti-arrow-narrow-right"></i>
                </a>
            @endif
        </li>
    </ul>
