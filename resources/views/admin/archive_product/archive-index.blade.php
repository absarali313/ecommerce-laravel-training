<x-admin.layout>
    <div class="container-fluid my-5 ">
        <div class="row d-flex justify-content-start">
            <div class="col-6  ">
                <h4 class="text-start">Archive Products</h4>
            </div>

            <div class="container-fluid bg-white rounded-3 mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <x-admin.product.product-button class="nav-link active" aria-current="page"  href="/admin/products" class="btn-gray rounded-2 mb-1 px-1 py-1">Product</x-admin.product.product-button>
                    </li>

                    <li class="nav-item">
                        <x-admin.product.product-button class="nav-link" href="/admin/products/archive" class="btn-gray rounded-2 mb-1 px-1 py-1">Archive</x-admin.product.product-button>
                    </li>
                </ul>

                <div class="row d-flex justify-content-between bg-light-gray mt-1 p-1">
                    <div class="col-2">
                        <h6 class="text-secondary">Product</h6>
                    </div>

                    <div class="col-3 flex justify-content-center align-content-center">
                        <h6 class="text-secondary">Title</h6>
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

                {{-- Products --}}
                @foreach($products as $product)
                    @include('admin.product.partials.product-box', [
                        'product' => $product,
                        'status' => false
                    ])
                @endforeach
            </div>
        </div>
    </div>
</x-admin.layout>
