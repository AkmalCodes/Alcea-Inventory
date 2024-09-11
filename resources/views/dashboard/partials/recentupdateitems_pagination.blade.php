
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link-custom" href="{{ $recentUpdatedItems->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $recentUpdatedItems->lastPage(); $i++)
                <li class="page-item {{ $i == $recentUpdatedItems->currentPage() ? 'active' : '' }}">
                    <a class="page-link-custom" href="{{ $recentUpdatedItems->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link-custom" href="{{ $recentUpdatedItems->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
