<div class='row bg-white rounded-3 px-4 py-2 border border-1 border-white shadow' ])>
    <div class='col'>
        <div class='row'>
            <div class='col'>
                <label for="name" class="text-start text-secondary">Name</label>
                <input id="name" name="name" class= 'bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-100'  placeholder="Rings" value="{{ $category?->name }}">

                <x-form-error name="name" />
            </div>
        </div>

        <div class= 'row mt-4' >
            <div class= 'col' >
                <div class= 'mb-3' >
                    <label for="image" class= 'form-label' >Upload Image</label>
                    <input class= 'form-control'  type="file" id="image" name="image" accept="image/*">

                    <x-form-error name="image" />
                </div>
            </div>
        </div>
    </div>
</div>
