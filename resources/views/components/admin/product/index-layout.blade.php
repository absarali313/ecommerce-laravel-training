 <div class="container-fluid my-5 ">
    <div class="row d-flex justify-content-around ">
            <div class="col-6">
                <h4> Products</h4>
            </div>

            <div class="col-6 d-flex justify-content-end ">
                <a href="/admin/products/create" class="btn btn-gray rounded-2">Add Product</a>
            </div>

            <div class="container-fluid bg-white rounded-3 mt-3">
                <div class="row d-flex flex-row justify-content-between">
                    <div class="col-6 mt-2 ">
                        <x-admin.product.product-button href="/admin/products/archive" class="btn-gray rounded-2 mb-1 px-1 py-1">Archive</x-admin.product.product-button>
                        <x-admin.product.product-button href="/admin/products" class="btn-gray rounded-2 mb-1 px-1 py-1">Products</x-admin.product.product-button>
                    </div>

                </div>

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

                {{$slot}}
            </div>

    </div>

 </div>
