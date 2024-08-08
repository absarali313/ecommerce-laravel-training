@props(['categories' => [], 'selectedCategories' => [] ])

<x-admin.layout>
    <div class="container-fluid my-5 ">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <a href="/admin/products" class="rounded-2 mx-1">
                <li class="fa fa-arrow-left text-secondary"></li>
            </a>
            <div class="row d-flex justify-content-around px-5">
                <div class="col-6">
                    <h4>Add Product</h4>
                </div>

                <div class="col-6 d-flex justify-content-end ">
                    <button type="submit" class="btn btn-gray rounded-2 mx-1 ">Save</button>
                </div>
            </div>

            <div class="row d-flex justify-content-around mt-1 p-1 ">
                <div class="col-7">

                   @include('admin.product.partials.description-box',[
                        'product' => null
                   ])
                </div>

                <div class="col-3">
                    @include('admin.product.partials.visbility-box')
                    @include('admin.product.partials.categories-box')
                </div>
            </div>
        </form>
    </div>

    @push('tinymce')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>
