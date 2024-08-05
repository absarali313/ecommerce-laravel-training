@props(['product'])
<x-layout>
    <style>
        .hover-border:hover {
            border-width: 3px !important; /* Increase border width on hover */
        }
        .text-gray-200 {
            color: 	#787878;/* Example gray color */
        }
    </style>

    <div class="d-flex w-100">
        <img src="http://picsum.photos/seed/{{rand(0,10000)}}/600/600" class="img-fluid mx-5 my-5" alt="">
        <div class="mx-5 my-5">
            <p class="my-0 text-gray-200 text-xs-start">My store</p>
            <h1 class="fs-2">{{$product->title}}  Boys | Girls</h1>
            <p class="fs-5">Rs.{{$product->smallestprice->price}}.00PKR</p>

            <p class="text-gray-200 my-2 text-sm-start">Size</p>
            @php
                 $sizes=$product->sizes;
            @endphp
            @foreach($sizes as $size)
                <x-client.product-size :size="$size->title"/>
            @endforeach

            <p  class="text-gray-200 my-2 ">Quantity</p>
            <x-client.product-quantity />
            <div class="d-flex align-items-center justify-content-center border border-1 border-dark mt-4 hover-border">
                <span type="button" class="my-2" >Add to cart</span>
            </div>
            <div class="d-flex align-items-center justify-content-center border border-1 border-dark my-2  bg-dark text-white">
                <span class="my-2" >Buy it now</span>
            </div>
            <div class="mt-5 text-gray-200">
                {{$product->description}}
            </div>
        </div>
    </div>

<div>
    <p class="ms-5 fs-5">You may also know</p>
</div>
    <div class="container my-5">
        <div class="row">
            @foreach($product->relatedproducts as $relate)
                            <x-client.product.product-box :product="$relate" />
            @endforeach
        </div>
    </div>

    <hr>
    <p class="ms-5 my-5 fs-6 text-gray-200 ">© 2024, ShopEase Powered by Shopify</p>
</x-layout>





{{--<x-layout>--}}
{{--    <style>--}}
{{--        .hover-border:hover {--}}
{{--            border-width: 3px !important; /* Increase border width on hover */--}}
{{--        }--}}
{{--        .text-gray-200 {--}}
{{--            color: 	#787878;/* Example gray color */--}}
{{--        }--}}
{{--    </style>--}}
{{--    </style>--}}
{{--    <div class="d-flex w-100">--}}
{{--        <img src="http://picsum.photos/seed/{{rand(0,10000)}}/600/600" class="img-fluid mx-5 my-5" alt="">--}}
{{--        <div class="mx-5 my-5">--}}
{{--            <p class="my-0 text-gray-200 text-xs-start">My store</p>--}}
{{--            <h1 class="fs-2">Titanium Gold Ring Boys | Girls</h1>--}}
{{--            <p class="fs-5">Rs.1000.00PKR</p>--}}
{{--            <p class="text-gray-200 my-2 text-sm-start">Size</p>--}}
{{--            <x-client.product-size :size="16"/>--}}
{{--            <x-client.product-size :size="25"/><x-client.product-size :size="30" /><x-client.product-size :size="35"/><x-client.product-size :size="40"/>--}}
{{--            <p  class="text-gray-200 my-2 ">Quantity</p>--}}
{{--            <x-client.product-quantity />--}}
{{--            <div class="d-flex align-items-center justify-content-center border border-1 border-dark mt-4 hover-border">--}}
{{--                <span type="button" class="my-2" >Add to cart</span>--}}
{{--            </div>--}}
{{--            <div class="d-flex align-items-center justify-content-center border border-1 border-dark my-2  bg-dark text-white">--}}
{{--                <span class="my-2" >Buy it now</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--</x-layout>--}}
