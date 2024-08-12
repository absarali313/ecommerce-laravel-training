@props(['items'=>[]])

@if ($items->hasPages())
    <nav aria-label="Page navigation example  ">
        <ul class="pagination justify-content-center">
            @if ($items->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link text-black" href="{{ $items->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($items->hasMorePages())
                <li class="page-item">
                    <a class="page-link text-black" href="{{ $items->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
