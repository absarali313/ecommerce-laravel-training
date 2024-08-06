<x-admin.layout>
    <div class="container-fluid my-5 ">
        <div class="row d-flex justify-content-around ">
            <div class="col-6">
                <h4>Categories</h4>
            </div>

            <div class="col-6 d-flex justify-content-end ">
                <a href="/admin/products/create" class="btn btn-gray rounded-2">Add Category</a>
            </div>

            <div class="container-fluid bg-white rounded-3 mt-3">
                <div class="row d-flex justify-content-between">
                    <div class="col-6 mt-2">
                        <button class="btn-gray rounded-2 mb-1">All</button>
                    </div>

                    <div class="col-6 d-flex justify-content-end align-items-center mt-2">
                        <button class="btn-gray rounded-2 mb-1">Archive</button>
                    </div>

                </div>

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

               @foreach($categories as $category)
                   <x-admin.Category.category-box :category="$category"></x-admin.Category.category-box>
                @endforeach

                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-admin.layout>
