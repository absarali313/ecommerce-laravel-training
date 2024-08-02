<x-layout >



    <div class="container my-5">
        <div class="row">
            @foreach($products as $product)
                 <x-client.product :product="$product" />
            @endforeach
        </div>
        <div>
            {{$products->links()}}
        </div>
    </div>



</x-layout>
