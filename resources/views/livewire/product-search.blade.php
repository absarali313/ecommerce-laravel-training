@props(['products' => []])

<div>
    <!-- Search Input -->
    <div class="input-group mt-3 form-control text-secondary rounded-5 bg-gray">
        <input class="form-control"
               type="text"
               wire:model.live.debounce.300ms="searchTerm"
               placeholder="Search products..."
               aria-label="Search"
        >
    </div>

    @if($showResults)
        <div class="mt-3 "  x-show="showResults">
            @if($products->isNotEmpty())
                @include('admin.product.partials.display', [
                    'products' => $products,
                ])
            @else
                <p class="text-muted">No products found.</p>
            @endif
        </div>
    @else
        @include('admin.product.partials.display', [
            'products' => $products,
        ])
    @endif
</div>
