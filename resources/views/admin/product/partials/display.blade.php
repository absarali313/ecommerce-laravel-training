@props(['products'=> []])

@foreach($products as $product)
    @include('admin.product.partials.listing-box', [
        'product' => $product,
    ])
@endforeach

<div class="row mt-4">
    <div class="col-12 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>
