<div>
    <div>
        <div class="container">
            <div x-data="{ handle: (item, position) => { @this.call('reorder', item, position) } }" x-sort="handle">
                @foreach($categories as $category)
                    <div class="col-12 sortable-item" x-sort:item="{{ $category->id }}">
                        @include('admin.category.partials.box', [
                            'category' => $category
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
