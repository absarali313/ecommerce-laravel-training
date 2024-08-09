@php
    $firstImage = $product->images->first();
    $image_url = $firstImage ? $firstImage->image_path : 'images/bracelet.jpg';
@endphp

<div class="row d-flex justify-content-between bg-white mt-2 border border-1 border-end-0 border-start-0 border-top-0  p-2">
    <div class="col-5">
        <div class="row flex justify-content-start align-items-center  ">
            <div class="col-5">
                <a href="/admin/products/edit/{{ $product->id }}">
                    <img src="{{ asset($image_url) }}" alt="product" class="border border-1 rounded-3" style="width:50px; height:50px">
                </a>
            </div>

            <div class="col-7 d-flex justify-content-center align-content-center ">
                <a class="text-center text-black text-decoration-underline text-center"  href="/admin/products/edit/{{ $product->id }}">{{ $product->title }}</a>
            </div>
        </div>
    </div>

    <div class="col-1 flex justify-content-center align-content-center">
        @include('admin.product.partials.product-status')
    </div>

    <div class="col-1 flex justify-content-center align-content-center">
        <h6 class="text-center">{{ $product->getTotalStock() }}</h6>
    </div>

    <div class="col-2 d-flex justify-content-end align-items-center">
        @if($product->trashed())
            <div>
                <form method="POST" action="{{ route("admin_restore_archive", $product->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-center btn rounded-3 mx-5 border border-1 border-secondary">
                        <li class="fa fa-undo text-secondary "></li>
                    </button>
                </form>
            </div>
        @else
            <div class="d-flex">
                <form method="POST" action="{{ route("admin_products_delete", $product) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-center btn rounded-3 mx-5 border border-1 border-secondary">
                        <li class="fa fa-trash text-secondary "></li>
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
