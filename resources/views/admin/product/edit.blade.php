<x-admin.layout>

    <div class="container-fluid my-5 ">

        <form id="productForm" method="POST" action="{{ route('products.update', $product) }}"
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <a href="/admin/products"class=" rounded-2 mx-1 "> <li class="fa fa-arrow-left text-secondary"></li></a>

            <div class="row d-flex justify-content-around px-5">

                <div class="col-6">
                    <h4>Edit Product</h4>
                </div>

                <div class="col-6 d-flex justify-content-end ">
                         <button form="productForm" type="submit" class="btn btn-gray rounded-2 mx-1 ">Save</button>
                </div>

            </div>

            <div class="row d-flex justify-content-around mt-1 p-1 ">

                <div class="col-7">
                    <x-admin.product.product-edit-description-box :product="$product"/>
                </div>

                <div class="col-3">
                    <x-admin.product.product-visbility-box :visibility="$product->Visibility"/>
                    <x-admin.product.product-edit-categories-box :categories="$categories"
                                                                 :selectedCategories="$selectedCategories"/>
                </div>

            </div>


        </form>


        <div class="row mt-4 mx-5">
            <div class="col bg-light-gray rounded-3 p-3">
                <div class="mb-3 row">

                    @foreach($product->images as $productImage)
                        <div class="col-3 mx-2 flex justify-content-center">
                            <form id="imageForm" method="POST"
                                  action='{{ route("products.images.delete", $productImage->id) }}'>
                                @csrf
                                @method('DELETE')
                                <img src="{{asset($productImage->image_path)}}"
                                     class="rounded-2 m-1 border border-1 border-white" alt='product'
                                     style='height:150px; width:150px'>
                                <button type="submit" form="imageForm" class="btn btn-red rounded-3 text-center mx-5">
                                    Delete
                                </button>

                            </form>
                        </div>
                    @endforeach

                </div>
                <x-form-error name="images"></x-form-error>
            </div>
        </div>

        <div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white mt-4">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{route("products.size.store",$product)}}">
                        @csrf
                        <div class="col d-flex justify-content-between py-2">
                            <p class="text-secondary">Sizes</p>

                        </div>
                        <div class="col">
                            <label for="size_title" class="text-start text-secondary">Size Title</label>
                            <input id="size_title" name="size_title"
                                   class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-25"
                                   placeholder="Small">
                            <x-form-error name="size_title"></x-form-error>

                            <label for="price" class="mx-2 text-start text-secondary">Price</label>
                            <input id="price" name="price" type="number"
                                   class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-25"
                                   placeholder="Rs. 1000">
                            <x-form-error name="price"></x-form-error>

                            <label for="stock" class="mx-2 text-start text-secondary">Stock</label>
                            <input id="stock" name="stock" type="number"
                                   class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 "
                                   placeholder="Small">
                            <x-form-error name="price"></x-form-error>
                            <button type='submit'
                                    class="mx-3 text-secondary border border-1 border-secondary rounded-2">
                                <li class="fa fa-plus"></li>
                            </button>
                        </div>

                    </form>


                    <div class="bg-light-gray rounded-3 p-3 mt-2">
                        @foreach($productSizes as $productSize)
                            <x-admin.product.size-box :productSize="$productSize"/>
                        @endforeach
                    </div>




            </div>

        </div>

    </div>
        <div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white mt-4">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{route('products.related.store',$product)}}">
                        @csrf

                        <div class="col d-flex justify-content-between py-2">
                            <p class="text-secondary">Related Product</p>
                            <button type='submit' class="btn btn-secondary rounded-2">Add Related</button>
                        </div>
                        <div class="col">
                            <label for="product_id" class="text-start text-secondary">Product ID</label>
                            <input id="product_id" name="product_id" type="number"
                                   class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-25"
                                   placeholder="{{$product->id}}">
{{--                            <x-form-error name="product_id"></x-form-error>--}}

                            <label for="Related_id" class="mx-2 text-start text-secondary">Related Product ID</label>
                            <input id="Related_id" name="Related_id" type="number"
                                   class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-25"
                                   placeholder="Like: 2">
{{--                            <x-form-error name="Related_id"></x-form-error>--}}

                        </div>
                    </form>


                    <div class="bg-light-gray rounded-3 p-3 mt-2">
                        @foreach($relatedProducts as $relatedProduct)
                            <form method="POST" action="{{route('products.related.update',$relatedProduct,old('$relatedProduct->related_product_id'))}}">
                                @csrf
                                @method('PUT')
                                <div class="row my-2">
                                    <div class="col-9 align-content-center">
                                        <x-admin.product.relatedProduct-box :relatedProduct="$relatedProduct"/>
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-success rounded-3 " name="action" value="update">Update
                                        </button>

                                    </div>
                                    <div class="col-1">

                                        <button class="btn btn-danger rounded-3 mx-3" name="action" value="delete">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>


                </div>

                </div>

            </div>

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
