<x-client.layout>
    <div class="container my-5">
        <div class="row">
            {{-- Product Boxes --}}
            @foreach($products as $product)
                @include('client.product.partials.box', [
                     'product' => $product,
                ])
            @endforeach
        </div>

        <x-client.paginator :items="$products"/>
    </div>
</x-client.layout>
