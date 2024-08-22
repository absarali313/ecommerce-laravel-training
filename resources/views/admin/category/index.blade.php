<x-admin.layout>
    <div class="container-fluid my-5 ">
        <x-admin.header :link="'admin_category_create'" :action-btn="'Add Category'">Category</x-admin.header>

        <div class="container-fluid bg-white rounded-3 mt-3">
            {{-- Filter Bar --}}
            <div class="container-fluid bg-white mt-3">
                <div class="row d-flex flex-row justify-content-between">
                    <div class="col-6 mt-2 ">
                        <div class="row d-flex align-items-center">
                            <div class="col-2 align-items-center">
                                <x-admin.product.product-button class="nav-link active" aria-current="page" href="{{ route('admin_categories') }}" class="btn-gray rounded-2 mb-1 px-1 py-1">Category</x-admin.product.product-button>
                            </div>

                            <div class="col-2">
                                <x-admin.product.product-button class="nav-link" href="{{ route('admin_categories_archive') }}" class="btn-gray rounded-2 mb-1 px-1 py-1">Archive</x-admin.product.product-button>
                            </div>
                        </div>
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
                <livewire:category.category-index/>
            </div>
        </div>
    </div>
</x-admin.layout>
