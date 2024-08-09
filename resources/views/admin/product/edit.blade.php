<x-admin.layout>
    <div class="container-fluid my-5 ">

        {{--Product Edit Block--}}
        <form id="productForm" method="POST" action="{{ route('admin_product_update', $product) }}"
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            {{--Back Button--}}
            <a href="/admin/products" class=" rounded-2 mx-1 ">
                <li class="fa fa-arrow-left text-secondary"></li>
            </a>

            {{--Form Header--}}
            <div class="row d-flex justify-content-around px-5">
                <div class="col-6">
                    <h4>Edit Product</h4>
                </div>

                <div class="col-6 d-flex justify-content-end ">
                    <button form="productForm" type="submit" class="btn btn-gray rounded-2 mx-1 ">Save</button>
                </div>
            </div>

            <div class="row d-flex justify-content-around mt-1 p-1 ">

                {{--Categories--}}
                <div class="col-7">
                    @include('admin.product.partials.description-box')
                </div>

                {{--Visibility--}}
                <div class="col-3">
                    @include('admin.product.partials.visibility-box')
                    @include('admin.product.partials.categories-box')
                </div>
            </div>
        </form>

        {{--Product Images Block--}}
        @include('admin.product.partials.images-form')
        {{--Product Sizes Block--}}
        @include('admin.product.partials.size-form')
        {{--Product Related Products Block--}}
        @include('admin.product.partials.relatedproducts-form', [
            'relatedProducts' => $product->relatedProducts
        ])
    </div>

    @push('tinymce')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>

