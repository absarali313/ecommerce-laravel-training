<x-admin.layout>
    <div class="container-fluid my-5 ">
        <div class="row d-flex justify-content-around ">

            {{-- Form Header --}}
            <div class="col-6">
                <h4>Categories</h4>
            </div>

            <div class="col-6 d-flex justify-content-end ">
                <a href="{{ route('admin_category_create') }}" class="btn btn-gray rounded-2">Add Category</a>
            </div>

            <div class="container-fluid bg-white rounded-3 mt-3">

                {{-- Filter Bar --}}
                <div class="row d-flex justify-content-between">
                    <div class="row d-flex flex-row justify-content-between">
                        <div class="col-6 mt-2 ">

                            <x-admin.product.product-button href="{{  route('admin_categories_archive') }}" class="btn-gray rounded-2 mb-1 px-1 py-1">Archive</x-admin.product.product-button>
                            <x-admin.product.product-button href="{{  route('admin_categories_index') }}" class="btn-gray rounded-2 mb-1 px-1 py-1">Categories</x-admin.product.product-button>

                        </div>
                    </div>
                </div>

                {{-- Category List Container --}}
                <div class="row d-flex justify-content-between bg-light-gray mt-1 p-1">
                    <div class="col-2">
                        <h6 class="text-secondary">Category</h6>
                    </div>

                    <div class="col-2 flex justify-content-center align-content-center">
                        <h6 class="text-center text-secondary">Title</h6>
                    </div>

                    <div class="col-2 flex justify-content-center align-content-center">
                        <h6 class="text-secondary text-center">Total Products</h6>
                    </div>

                    <div class="col-2 flex justify-content-center align-content-center">
                        <h6 class="text-secondary text-center">Actions</h6>
                    </div>
                </div>

                {{-- Categories --}}
                <div>
                    @foreach($categories as $category)
                        @include('admin.category.partials.category-box', [
                            'category' => $category
                        ])
                    @endforeach
                </div>

                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
