@props(['products'])
<div class="row d-flex justify-content-between bg-light-gray mt-1 p-1">
    <div class="col-2">
        <h6 class="text-secondary">Product</h6>
    </div>
    <div class="col-3 flex justify-content-center align-content-center">
        <h6 class="text-center text-secondary">Title</h6>
    </div>
    <div class="col-2 flex justify-content-center align-content-center">
        <h6 class="text-secondary text-center">Status</h6>
    </div>
    <div class="col-2 flex justify-content-center align-content-center">
        <h6 class="text-secondary text-center">Inventory</h6>
    </div>
    <div class="col-2 flex justify-content-center align-content-center">
        <h6 class="text-secondary text-center">Actions</h6>
    </div>
</div>

@foreach($products as $product)
    <x-admin.product.product-box :product="$product"  :status="true"/>

@endforeach

