<x-client.layout>
    <x-client.product.hero-banner/>
    <div class="container my-5">
        <div class="row">

            {{-- Product Boxes --}}
            @foreach($products as $product)
                @include('client.product.partials.product-box', [
                'item' => $product,
                ])
            @endforeach
        </div>

        <x-client.paginator :items="$products"/>

    </div>
</x-client.layout>
