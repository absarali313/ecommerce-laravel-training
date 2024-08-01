@props(['categories', 'selectedCategories' => [] ])

<x-admin.layout>

    <div class="container-fluid my-5 ">

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="row d-flex justify-content-around ">

                <div class="col-6">
                    <h4>Add Product</h4>
                </div>

                <div class="col-6 d-flex justify-content-end ">
                    <a class="btn btn-red rounded-2 mx-1 ">Cancel</a>
                    <button type="submit" class="btn btn-gray rounded-2 mx-1 ">Save</button>
                </div>

            </div>

            <div class="row d-flex justify-content-around mt-1 p-1 ">

                <div class="col-7">
                    <x-admin.product.product-description-box/>
                </div>

                <div class="col-3">
                    <x-admin.product.product-visbility-box/>
                    <x-admin.product.product-categories-box :categories="$categories"/>
                </div>

            </div>

            <div class="row bg-white rounded-3 mx-5  py-2 border border-1 border-white mt-4">

                <div class="row">
                    <div class="col">

                        <div class="row d-flex justify-content-between">
                            <div class="col">
                                <h5 class="text-start text-secondary">Sizes</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a id="addSizeBox" class="btn btn-outline-secondary">Add Size Box</a>
                            </div>
                        </div>

                        <x-admin.product.size-box/>

                    </div>
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
