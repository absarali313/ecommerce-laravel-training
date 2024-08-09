<x-admin.layout>
    <div class="container-fluid my-5 ">
        <form method="POST" action="{{ route('admin_product_store') }}" enctype="multipart/form-data">
            @csrf
            <a href="/admin/products" class="rounded-2 mx-1">
                <li class="fa fa-arrow-left text-secondary"></li>
            </a>

            <x-admin.header :has-action="true" >Add Product</x-admin.header>

            <div class="row d-flex justify-content-around mt-1 p-1 ">
                <div class="col-7">
                    @include('admin.product.partials.description-box', [
                         'product' => null
                    ])
                </div>

                <div class="col-3">
                    @include('admin.product.partials.visibility-box',[
                        'product' => null
                    ])
                    @include('admin.product.partials.categories-box', [
                        'selectedCategories' => null
                    ])
                </div>
            </div>
        </form>
    </div>

    @push('tinymce')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>
