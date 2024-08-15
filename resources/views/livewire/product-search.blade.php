<div>
    <div class="input-group">
        <form wire:submit="search" class="d-flex w-100 mt-5" >
            <input class="form-control text-secondary rounded-5 bg-light " type="text" wire:model="searchTerm" placeholder="Search products..." aria-label="Search">

            <button class="btn btn-outline-secondary rounded-5 ms-2 d-flex align-items-center justify-content-center" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    @if($products->isNotEmpty())
        <ul class="list-group mt-3 text-black">
            @foreach($products as $product)
                <li class="list-group-item">
                    <a class="text-center text-black text-decoration-underline text-center" href="{{ route('admin_product_edit', $product->id) }}">
                        {{ $product->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted mt-3">No products found.</p>
    @endif
</div>


