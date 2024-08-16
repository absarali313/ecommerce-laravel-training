 <div>
    <div>
        <div class="container d-flex border border-top-0 border-start-0 border-end-0 border-secondary-subtle justify-content-center mb-1 pb-1">
            <input id="searchInput" wire:model="searchText" wire:keydown="loadCategories()" class="form-control w-auto" type="search" placeholder="Search" aria-label="Search">
        </div>
    </div>

    @foreach($categories as $category)
        @include('admin.category.partials.box', [
            'category' => $category,
        ])
    @endforeach
 </div>
