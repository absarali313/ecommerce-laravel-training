<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="container d-flex justify-content-center border-bottom">
                <h3>Add Products</h3>
            </div>

            <div>
                <div class="container mt-3 d-flex border border-top-0 border-start-0 border-end-0 border-secondary-subtle justify-content-center mb-1 pb-1">
                    <input id="searchInput" wire:model="searchText" wire:keydown="loadProducts()" class="form-control w-auto" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>

            <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                @foreach($products as $product)
                    <div class="row d-flex justify-content-center align-items-center mt-1 border-top">
                        <div class="col">
                            <input type="checkbox" class="form-check-input" name="product-title-{{ $product->id }}" id="{{ $product->id }}" wire:click="toggle({{ $product->id }})"@checked(in_array($product->id, $selectedProducts))>
                            <img class="rounded-3" src="{{ asset($product->images->first()?->image_path ?? '') }}" style="width: 50px; height: 50px" alt="product_img">
                        </div>

                        <div class="col d-flex justify-content-center align-items-center">
                            <label class="form-check-label" for="product-{{ $product->id }}">{{ $product->title }}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
