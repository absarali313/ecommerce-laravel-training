<div class="container d-flex ">
    <div class="row d-flex w-100 justify-content-end align-items-start">
        <div class="col-md-6  align-items-center">
            <div class="form-inline">
                <input id="searchInput" wire:model="searchText" wire:keydown="getProducts()" class="form-control w-auto" type="search" placeholder="Search" aria-label="Search">
            </div>

            @if($categories)
                <!-- Search Results -->
                <div id="searchResults" class="mt-0 searchResults position-absolute w-25 bg-white overflow-y-scroll border border-1 px-1 py-2 rounded-4" style="max-height: 15rem;">
                    @foreach($categories as $category)
                       <x-admin.searched-item :category="$category"/>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
