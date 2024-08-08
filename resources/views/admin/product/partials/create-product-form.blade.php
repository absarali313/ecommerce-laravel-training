<div @class([ 'container-fluid my-5 ' ])>
    <form method="POST" action="{{ route('admin_products_store') }}" enctype="multipart/form-data">
        @csrf
        <a href="/admin/products" @class([ 'rounded-2 mx-1' ])>
            <li @class([ 'fa fa-arrow-left text-secondary' ])></li>
        </a>
        <div @class([ 'row d-flex justify-content-around px-5' ])>
            <div @class([ 'col-6' ])>
                <h4>Add Product</h4>
            </div>

            <div @class([ 'col-6 d-flex justify-content-end ' ])>
                <button type="submit" @class([ 'btn btn-gray rounded-2 mx-1 ' ])>Save</button>
            </div>
        </div>

        <div @class([ 'row d-flex justify-content-around mt-1 p-1 ' ])>
            <div @class([ 'col-7' ])>

                <x-admin.product.product-create-description-box />
            </div>

            <div @class([ 'col-3' ])>

                <x-admin.product.product-visbility-box />

                <x-admin.product.product-create-categories-box :categories="$categories" :selectedCategoies="$selectedCategories" />
            </div>
        </div>
    </form>
</div>
