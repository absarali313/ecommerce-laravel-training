<div class="row d-flex justify-content-between bg-white mt-2 border border-1 border-end-0 border-start-0 border-top-0  p-2">
    <div class="col-5">
        <div class="row flex justify-content-start align-items-center  ">
            <div class="col-5">
                <a href="{{ route('admin_category_edit', $category) }}">
                    <img src="{{ asset($category->image_path) }}"  alt="product" class="border border-1 rounded-3" style="width:50px; height:50px">
                </a>
            </div>

            <div class="col-7 flex justify-content-center align-content-center">
                <a class="text-center text-black text-decoration-underline" href="{{ route('admin_category_edit', $category) }}">{{ $category->name }}</a>
            </div>
        </div>
    </div>

    <div class="col-2 flex justify-content-center align-content-center">
        <h6 class="text-center">{{ $category->getTotalProductsCount() }}</h6>
    </div>

    <div class="col-2 flex justify-content-end align-items-center">
        @if($category->trashed())
            <button type="submit" wire:click="restore({{ $category->id }})" wire:confirm="Are you sure you want to restore this category?" class="text-center btn rounded-3 mx-5 border border-1 border-secondary">
                <li class="fa fa-undo text-secondary "></li>
            </button>
        @else
            <button type="submit" wire:click="delete({{ $category }})" wire:confirm="Are you sure you want to delete this category?" class="text-center btn rounded-3 mx-5 border border-1 border-secondary">
                <li class="fa fa-trash text-secondary "></li>
            </button>
        @endif
    </div>
</div>

