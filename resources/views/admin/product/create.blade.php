<x-admin.layout>
    <div class="container-fluid my-5 ">
        <form method="POST" action="{{ route('admin_product_store') }}" enctype="multipart/form-data">
            @csrf
            <x-admin.back-button :link="'admin_categories'"/>

            <x-admin.header :has-action="true">Add Product</x-admin.header>

            <div class="row d-flex justify-content-around mt-1 p-1 ">
                <div class="col-7">
                    @include('admin.product.partials.description-box')
                </div>

                <div class="col-3">
                    @include('admin.product.partials.visibility-box')
                </div>
            </div>
        </form>
    </div>

    @push('script')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>
