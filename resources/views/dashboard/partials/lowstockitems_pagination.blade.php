@php
    $currentPage = $lowStockItems->currentPage();
    $lastPage = $lowStockItems->lastPage();
    $start = max($currentPage - 2, 1);
    $end = min($start + 4, $lastPage);
    if ($end - $start < 4) {
        $start = max($end - 4, 1);
    }
@endphp

<nav aria-label="Page navigation example">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($currentPage > 1)
            <li class="page-item">
                <a class="page-link-custom" href="{{ $lowStockItems->url($currentPage - 1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif

        {{-- Page Numbers --}}
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link-custom" href="{{ $lowStockItems->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Next Page Link --}}
        @if ($currentPage < $lastPage)
            <li class="page-item">
                <a class="page-link-custom" href="{{ $lowStockItems->url($currentPage + 1) }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
