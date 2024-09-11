<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="{{ $inventoryItems->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @for ($i = 1; $i <= $inventoryItems->lastPage(); $i++)
            <li class="page-item {{ $i == $inventoryItems->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $inventoryItems->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item">
            <a class="page-link" href="{{ $inventoryItems->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
