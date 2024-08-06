@props(['categories' => [], 'selectedCategories' => [] ])

<x-admin.layout>
    <div class="container-fluid my-5 ">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <a href="/admin/products" class=" rounded-2 mx-1 "> <li class="fa fa-arrow-left text-secondary"></li></a>
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
                    <x-admin.product.product-create-description-box/>
                </div>

                <div class="col-3">
                    <x-admin.product.product-visbility-box/>
                    <x-admin.product.product-create-categories-box :categories="$categories" :selectedCategoies="$selectedCategories"/>
                </div>

            </div>

        </form>
    </div>

    <script>
        tinymce.init({
            selector: '#description',  // The ID of your textarea
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            height: 300
        });
    </script>
</x-admin.layout>
