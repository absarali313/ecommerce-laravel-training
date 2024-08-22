@props(['productSize' => [] ])

<form method="POST" action="{{ route('admin_size_update',$productSize) }}">
    @csrf
    @method('PUT')
    <div class= 'row my-2 border border-1 border-white border-top-0 border-start-0 border-end-0 py-3 mt-2 mb-2'>
        <div class= 'col-10 align-content-center' >
            <div class= 'col' >
                <label for="title" class= 'text-start text-secondary' >Size Title</label>
                <input id="title" name="title" class= 'bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-10 form-label' placeholder="Small" value= {{ $productSize->title }}>

                <x-form-error name="title" />

                <label for="price" class= 'mx-2 text-start text-secondary' >Price</label>
                <input id="price" name="price" type="number" class= 'bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-10 form-label'  placeholder="Rs. 1000" value= {{ $productSize->getCurrentPrice()->price?? 0 }}>

                <x-form-error name="price" />

                <label for="stock" class= 'mx-2 text-start text-secondary' >Stock</label>
                <input id="stock" name="stock" type="number" class= 'bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-10 form-label'  placeholder="Small" value= {{ $productSize->stock }}>

                <x-form-error name="price" />
            </div>
        </div>

        <div class= 'col-1' >
                <button class= ' rounded-3 border-success ' name="action" value="update">
                    <li class= 'fa fa-pen text-success' ></li>
                </button>
        </div>
    </div>
</form>
<form method="POST" action="{{ route('admin_size_destroy',$productSize) }}">
    @csrf
    @method('DELETE')
    <input id="title" name="title" type="hidden"  class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2" value={{ $productSize->title }}>
    <input id="price" name="price" type="hidden"  class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2" value= {{ $productSize->getCurrentPrice()->price?? 0 }}>
    <input id="stock" name="stock" type="hidden"  class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2" value={{ $productSize->stock }}>

        <button class= ' rounded-3 border-secondary 3' name="action" value="delete">
            <li class= 'fa fa-trash text-secondary' ></li>
        </button>
</form>
