<div class='row mt-4 mx-5'>
    <div class='col bg-light-gray rounded-3 p-3' >
        <div class='mb-3 row' >
            @foreach($product->images as $productImage)
                <div class='col-3 mx-2 flex justify-content-center' >
                    <form id="imageForm" method="POST" action='{{ route("admin_product_image_delete", $productImage->id) }}'>
                        @csrf
                        @method('DELETE')
                        <img src="{{ asset($productImage->image_path) }}"  class='rounded-2 m-1 border border-1 border-white image-style'  alt='product'>
                        <button type="submit" form="imageForm" class='btn btn-red rounded-3 text-center mx-5' >Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <x-form-error name="images" />
    </div>
</div>
