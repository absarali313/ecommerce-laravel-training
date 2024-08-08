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

                    <label for="Related_id" class="mx-2 text-start text-secondary">Related Product ID</label>
                    <input id="Related_id" name="Related_id" type="number" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-25"  placeholder="Like: 2">

                    <x-form-error name="Related_id"/>

                    <button type='submit' class="mx-3 text-secondary border border-1 border-secondary rounded-2">
                        <li class="fa fa-plus"></li>
                    </button>
                </div>
            </form>

            {{--Display Existed Related Prroducts--}}
            <div class="bg-light-gray rounded-3 p-3 mt-2">
                @foreach($relatedProducts as $relatedProduct)
                    <form method="POST" action="{{ route('admin_related_products_update', $relatedProduct) }}">
                        @csrf
                        @method('PUT')
                        <div class="row my-2">
                            {{--Display Related Products--}}
                            <div class="col-9 align-content-center">

                                <x-admin.product.relatedProduct-box :relatedProduct="$relatedProduct"/>
                            </div>

                            {{--Modification Buttons--}}
                            <div class=" col-2 ms-5">
                                <div class="row justify-content-start gap-3">
                                    {{--Update Button--}}
                                    <div class="col-1">
                                        <button class="rounded-3 border-success" name="action" value="update">
                                            <li class="fa fa-pen text-success"></li>
                                        </button>
                                    </div>

                                    {{--Delete Button--}}
                                    <div class="col-1">
                                        <button class="rounded-3 border-secondary 3" name="action" value="delete">
                                            <li class="fa fa-trash text-secondary"></li>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
