@props(['categories'=>[]])
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
                    <div class="row bg-white rounded-3 px-4 py-2 border border-1 border-white">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="title" class="text-start text-secondary">Title</label>
                                    <input id="title" name="title"
                                           class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-100"
                                           placeholder="Black Titanium Ring">
                                    <x-form-error name="title"></x-form-error>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="description" class="text-start text-secondary">Description</label>
                                    <textarea id="description" name="description"
                                              class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-100"
                                              placeholder="Describe the specifications of your product"></textarea>
                                    <x-form-error name="description"></x-form-error>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="images" class="form-label">Upload Images</label>
                                        <input class="form-control" type="file" id="images" name="images"
                                               accept="image/*" multiple>
                                    </div>
                                    <x-form-error name="images"></x-form-error>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-3">
                    <div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white">
                        <div class="col">

                            <div class="row">
                                <div class="col">
                                    <label for="visibility" class="text-start text-secondary">Visibility</label>
                                    <select id="visibility" name="visibility" class="form-select">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <x-form-error name="visibility"></x-form-error>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white mt-4">

                        <div class="row">
                            <div class="col">
                                <label for="categories" class="text-start text-secondary">Categories</label>
                                <div id="categories" class="form-check">
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   id="category-{{ $category->id }}" name="categories[]"
                                                   value="{{ $category->id }}">
                                            <label class="form-check-label" for="category-{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <x-form-error name="categories"></x-form-error>
                            </div>
                        </div>

                    </div>
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
