@props(['allProducts' => []])

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
                    @foreach($products as $product)
                        @include('admin.product.partials.listing-box', [
                            'product' => $product,
                        ])
                    @endforeach
                @else
                    <p class="text-muted">No products found.</p>
                @endif
        </div>
    @else
        <livewire:product-reorder :products="$products" />
    @endif
</div>
