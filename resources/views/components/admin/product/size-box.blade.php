@props(['productSize' => [] ])
<div class="col">
    <label for="size_title" class="text-start text-secondary">Size Title</label>
    <input id="size_title" name="size_title"
           class="bg-white-50 text border border-opacity-25 border-black rounded-2 px-2 w-10" style="width:100px"
           placeholder="Small" value= {{$productSize->title}}>
    <x-form-error name="size_title"></x-form-error>

    <label for="price" class="mx-2 text-start text-secondary">Price</label>
    <input id="price" name="price" type="number"
           class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-10" style="width:100px"
           placeholder="Rs. 1000" value= {{$productSize->getCurrentPrice()->price?? 0}}>
    <x-form-error name="price"></x-form-error>

    <label for="stock" class="mx-2 text-start text-secondary">Stock</label>
    <input id="stock" name="stock" type="number"
           class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-10" style="width:100px"
           placeholder="Small" value= {{$productSize->stock}}>
    <x-form-error name="price"></x-form-error>
</div>
