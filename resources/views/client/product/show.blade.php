@props(['product'])

<x-client.layout>
    <div class="d-flex w-100">

        {{-- Product Image --}}
        <img src="http://picsum.photos/seed/{{ rand(0,10000) }}/600/600" class="img-fluid mx-5 my-5" alt="">
        <div class="mx-5 my-5">

            {{-- Product Details --}}
            <p class="my-0 text-gray-200 text-xs-start">Planet Silver</p>
            <h1 class="fs-2">{{ $product?->title }}  Boys | Girls</h1>
            <p class="fs-5">Rs.{{ $product?->smallestprice?->price }}.00PKR</p>
            <p class="text-gray-200 my-2 text-sm-start">Size</p>
            {{-- Product Sizes --}}
            @foreach($product->sizes as $size)
                @include('client.product.partials.product-size', [
                'size' => $size->title,
                ])
            @endforeach
            <p  class="text-gray-200 my-2 ">Quantity</p>
            @include('client.product.partials.product-quantity')

            {{-- Add to cart Block --}}
            <div class="d-flex align-items-center justify-content-center border border-1 border-dark mt-4 hover-border">
                <span type="button" class="my-2" >Add to cart</span>
            </div>

            {{-- Buy it Block --}}
            <div class="d-flex align-items-center justify-content-center border border-1 border-dark my-2  bg-dark text-white">
                <span class="my-2" >Buy it now</span>
            </div>

            {{-- Product Description Block--}}
            <div class="mt-5 text-gray-200">
                {{ $product->description }}
            </div>
        </div>
    </div>

    <div>
        <p class="ms-5 fs-5">You may also want</p>
    </div>

    <div class="container my-5">
        <div class="row">
            @foreach($product->relatedproducts as $relate)
                @include('client.product.partials.product-box', [
                'item' => $relate,
                ])
            @endforeach
        </div>
    </div>
    <hr>
    <p class="ms-5 my-5 fs-6 text-gray-200 ">© 2024, ShopEase Powered by Shopify</p>
</x-client.layout>

