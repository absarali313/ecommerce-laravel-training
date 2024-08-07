<form id="productForm" method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    {{--Arrow--}}
    <a href="/admin/products" class=" rounded-2 mx-1 ">
        <li class="fa fa-arrow-left text-secondary"></li>
    </a>

    {{--Title and Save Button--}}
    <div class="row d-flex justify-content-around px-5">
        <div class="col-6">
            <h4>Edit Product</h4>
        </div>

        <div class="col-6 d-flex justify-content-end ">
            <button form="productForm" type="submit" class="btn btn-gray rounded-2 mx-1 ">Save</button>
        </div>
    </div>

    {{--Categories--}}
    <div class="row d-flex justify-content-around mt-1 p-1 ">
        <div class="col-7">

            <x-admin.product.product-edit-description-box :product="$product" />
        </div>

        <div class="col-3">

            <x-admin.product.product-visbility-box :visibility="$product->Visibility" />

            <x-admin.product.product-edit-categories-box :categories="$categories" :selectedCategories="$selectedCategories" />
        </div>
    </div>
</form>
