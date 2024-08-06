<x-admin.layout>
    <x-admin.product.index-layout>
        @foreach($products as $product)
            <x-admin.product.product-box :product="$product"></x-admin.product.product-box>
        @endforeach
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>

        </div>

    </x-admin.product.index-layout>
</x-admin.layout>
