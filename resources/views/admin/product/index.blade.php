<x-admin.layout>
    <div class="container-fluid my-5 ">
        <div class="row d-flex justify-content-around ">
            <div class="col-6">
                <h4> Products</h4>
            </div>
            <div class="col-6 d-flex justify-content-end ">
                <button class="btn btn-gray rounded-2">Add Product</button>
            </div>

            <div class="container-fluid bg-white rounded-3 mt-3">
                <div class="row d-flex justify-content-between">
                    <div class="col-6 mt-2">
                        <button class="btn-gray rounded-2 mb-1">All</button>
                        <button class="btn-gray rounded-2 mb-1">Active</button>
                        <button class="btn-gray rounded-2 mb-1">Draft</button>
                    </div>
                    <div class="col-6">
                    </div>
                </div>

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
                </div>
               @foreach($products as $product)
                   <x-admin.product.product-box :product="$product"></x-admin.product.product-box>
                @endforeach



            </div>
        </div>


    </div>
</x-admin.layout>
