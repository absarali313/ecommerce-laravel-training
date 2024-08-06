<x-layout>
    <div class="container my-5">
        <div class="row">
            @foreach($categories as $category)
                 <x-client.category.category-box :item="$category" />
            @endforeach
        </div>

       <x-client.paginator :items="$categories" />

    </div>
</x-layout>
