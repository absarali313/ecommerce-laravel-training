<x-layout >

    <div class="container my-5">
        <div class="row">
            @foreach($products as $product)
                 <x-client.product.product-box :product="$product" />
            @endforeach
        </div>

        <x-client.paginator :items="$products" />
    </div>
</x-layout>
