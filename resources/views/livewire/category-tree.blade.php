<div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white mt-3 shadow">
    <label for="visibility" class="text-start text-secondary">Categories</label>

    @foreach($categories as $category)
        @include('livewire.partials._category', [
            'category' => $category
        ])
    @endforeach

</div>
