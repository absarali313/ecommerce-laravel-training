<x-layout >

    <div class="container my-5">
        <div class="row">
            @foreach($products as $product)
                 <x-client.product :product="$product" />
            @endforeach
        </div>

        @if ($products->hasPages())
            <nav aria-label="Page navigation example  ">
                <ul class="pagination justify-content-center">
{{--                    <li class="page-item ">--}}
{{--                        <a class="page-link text-black" href="{{ $products->previousPageUrl() }}" aria-label="Previous">--}}
{{--                            <span aria-hidden="true">&laquo;</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @if ($products->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link text-black" href="{{ $products->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                        </li>
                    @endif
                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link text-black" href="{{ $products->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&raquo;</span>
                        </li>
                    @endif
{{--                    <li class="page-item"><a class="page-link text-black" href="">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link text-black" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link text-black" href="#">3</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link text-black" href=" {{ $products->nextPageUrl()}}" aria-label="Next">--}}
{{--                            <span aria-hidden="true">&raquo;</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </nav>
        @endif

    </div>



</x-layout>
