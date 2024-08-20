<div>
    <div x-data="sortableProducts()" x-init="initializeSortable()">
        <div class="container">
            <div class="row" x-ref="sortableList">
                @foreach($categories as $category)
                    <div class="col-12 sortable-item" data-id="{{ $category->id }}">
                        @include('admin.category.partials.box', [
                            'category' => $category
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function sortableProducts() {
            return {
                initializeSortable() {
                    if (this.$refs.sortableList) {
                        const sortable = Sortable.create(this.$refs.sortableList, {
                            animation: 150,
                            onEnd: (event) => {
                                // Ensure this.$refs.sortableList.children is not undefined
                                if (this.$refs.sortableList.children) {
                                    const reorderedIds = Array.from(this.$refs.sortableList.children)
                                        .map((item) => item.dataset.id);

                                    // Emit the event to Livewire
                                    if (window.Livewire) {
                                        @this.call('updateSortOrder', reorderedIds);
                                    } else {
                                        console.error('Livewire is not defined.');
                                    }
                                }
                            }
                        });
                    }
                }
            };
        }
    </script>

</div>
