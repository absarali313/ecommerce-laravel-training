<x-admin.layout>
    <x-admin.product.index-layout>
        @foreach($products as $product)
            <x-admin.product.product-box :product="$product" :status="true" />
        @endforeach
    </x-admin.product.index-layout>
</x-admin.layout>
