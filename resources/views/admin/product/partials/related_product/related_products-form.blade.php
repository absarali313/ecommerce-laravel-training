<div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white mt-4">
    <div class="row">
        <div class="col">
            {{--Add Related Prroduct Form--}}
            <form method="POST" action="{{ route('admin_related_products_store', $product) }}">
                @csrf
                <div class="col d-flex justify-content-between py-2">
                    <p class="text-secondary">Related Product</p>
                </div>

                <div class="col">
                    <label for="product_id" class="text-start text-secondary">Product ID</label>
                    <label class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-25">{{ $product->id }}</label>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <x-form-error name="product_id"/>

                    <label for="related_product_id" class="mx-2 text-start text-secondary">Related Product ID</label>
                    <input id="related_product_id" name="related_product_id" type="number" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-25" value="{{ old('related_product_id') }}"  placeholder="Like: 2">

                    <x-form-error name="related_product_id"/>

                    <button type='submit' class="mx-3 text-secondary border border-1 border-secondary rounded-2">
                        <li class="fa fa-plus"></li>
                    </button>
                </div>
            </form>

            {{--Display Existed Related Prroducts--}}
            <div class="bg-light-gray rounded-3 p-3 mt-2">
                @foreach($product->relatedProducts as $relatedProduct)
                    {{--Display Related Products--}}
                    <div class="row">
                        <div class="col-6">
                            <form method="POST" action="{{ route('admin_related_products_update', $relatedProduct) }}">
                                @csrf
                                @method('PUT')
                                <x-admin.product.relatedProduct-box :relatedProduct="$relatedProduct"/>

                                <button class="rounded-3 border-success" name="action" value="update">
                                    <li class="fa fa-pen text-success"></li>
                                </button>
                            </form>
                        </div>

                        <div class="col-6">
                            <form method="POST" action="{{ route('admin_related_products_destroy', $relatedProduct) }}">
                                @csrf
                                @method('Delete')
                                <input type="hidden" name="product_id" value="{{ $relatedProduct->pivot->product_id }}">
                                <input type="hidden" name="related_product_id" value="{{ $relatedProduct->pivot->related_product_id }}">

                                <button class="rounded-3 border-secondary 3" name="action" value="delete">
                                    <li class="fa fa-trash text-secondary"></li>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
