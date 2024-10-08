<div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white mt-4 shadow">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{ route("admin_size_store", $product) }}" >
                @csrf
                {{--Size Title--}}
                <div class="col d-flex justify-content-between py-2">
                    <p class="text-secondary">Sizes</p>
                </div>

                {{--Add Product Size Block--}}
                <div class="col">
                    {{--Title--}}
                    <label for="size_title" class="text-start text-secondary">Size Title</label>
                    <input id="size_title" name="size_title" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2" value="{{ old('size_title') }}"  placeholder="Small">

                    <x-form-error name="size_title" />

                    {{--Price--}}
                    <label for="price" class="mx-2 text-start text-secondary">Price</label>
                    <input id="price" name="price" type="number" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2" value="{{ old('price') }}" placeholder="Rs. 1000">

                    <x-form-error name="price"/>

                    {{--Stock--}}
                    <label for="stock" class="mx-2 text-start text-secondary">Stock</label>
                    <input id="stock" name="stock" type="number" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2" value="{{ old('stock') }}" placeholder="6">

                    <x-form-error name="stock" />

                    {{-- Action Input --}}
                    <input type="hidden" id="action" name="action" value="create">

                    {{--Add size Button--}}
                    <button type='submit' class="mx-3 text-secondary border border-1 border-secondary rounded-2">
                        <li class="fa fa-plus" ></li>
                    </button>
                </div>
            </form>

            {{-- Product Sizes --}}
            <div class="bg-light-gray rounded-3 p-3 mt-2">
                @foreach($product->sizes as $productSize)
                    <x-admin.product.size-box :productSize="$productSize" />
                @endforeach
            </div>
        </div>
    </div>
</div>
