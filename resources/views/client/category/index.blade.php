<x-client.layout>
    <div class="container my-5">
        <div class="row">
            {{-- Product Boxes --}}
            @foreach($categories as $category)
                @include('client.category.partials.category-box', [
                     'category' => $category,
                ])
            @endforeach
        </div>

        <x-client.paginator :items="$categories" />
    </div>
</x-client.layout>
