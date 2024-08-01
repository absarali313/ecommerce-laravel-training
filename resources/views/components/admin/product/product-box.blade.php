@props(['product'])
@php
    // Retrieve the first image associated with the product
    $firstImage = $product->images->first();

    // Check if an image exists and has an image_path
    $image_url = $firstImage ? $firstImage->image_path : 'images/bracelet.jpg';
@endphp
<div class="row d-flex justify-content-between bg-white mt-2 border border-1 border-end-0 border-start-0 border-top-0  p-2">
    <div class="col-6">
        <div class="row flex justify-content-start align-items-center  ">
            <div class="col-5">
                <a href="/admin/products/edit/{{$product->id}}"><img src="{{asset($image_url)}}" alt="product"
                     class="border border-1 rounded-3" style="width:50px; height:50px"></a>
            </div>
            <div class="col-7 flex justify-content-center align-content-center">
                <a class="text-center text-black text-decoration-none" href="/admin/product/edit/{{$product->id}}">{{$product->title}}</a>
            </div>
        </div>
    </div>
    <div class="col-2 flex justify-content-center align-content-center">
        <x-admin.product.product-status :visible='false'>Active</x-admin.product.product-status>
    </div>
    <div class="col-2 flex justify-content-center align-content-center">
        <h6 class="text-center">{{$product->getTotalStock()}}</h6>
    </div>
</div>
