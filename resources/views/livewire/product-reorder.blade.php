@props(['products'=> []])

<div x-data="sortableProducts()" x-init="initializeSortable" x-ref="sortableList">
    <div class="row">
        @foreach($products as $product)
            <div class="col-12" data-id="{{ $product->id }}">
                @include('admin.product.partials.listing-box', [
                    'product' => $product,
                ])
            </div>
        @endforeach
    </div>
</div>

<script>
    function sortableProducts() {
        return {
            initializeSortable() {
                const sortable = Sortable.create(this.$refs.sortableList.querySelector('.row'), {
                    animation: 150,
                    onEnd: (event) => {
                        console.log('Dragged:', event);
                        const reorderedIds = Array.from(this.$refs.sortableList.querySelector('.row').children)
                            .map((item) => item.dataset.id)

                        // Emit the event to Livewire
                        @this.call('reorder', reorderedIds);
                    }
                });
            }
        };
    }
</script>
