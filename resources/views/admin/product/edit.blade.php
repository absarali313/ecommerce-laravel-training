<x-admin.layout>
    <div class="container-fluid my-5 ">
        {{--Product Edit Block--}}
        <form id="productForm" method="POST" action="{{ route('admin_product_update', $product) }}"
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            {{--Back Button--}}
            <x-admin.back-button :link="'admin_products'"/>

            {{--Form Header--}}
            <x-admin.header class="mx-4" :has-action="true">Edit Product</x-admin.header>

            <div class="row d-flex justify-content-around mt-1 p-1 ">
                {{--Categories--}}
                <div class="col-7">
                    @include('admin.product.partials.description-box')
                </div>

                {{--Visibility--}}
                <div class="col-4">
                    @include('admin.product.partials.visibility-box')
                    @livewire('category.category-tree', [
                        'product' => $product,
                        'selectedCategory' => $product->categories()->pluck('category_id')->toArray(),
                    ])
                </div>
            </div>
        </form>

        {{--Product Images Block--}}
        @include('admin.product.partials.images-form')

        {{--Product Sizes Block--}}
        @include('admin.product.partials.size.size-form')

        {{--Product Related Products Block--}}
        @include('admin.product.partials.related_product.related_products-form', [
            'relatedProducts' => $product->relatedProducts
        ])
    </div>

    @push('script')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>

