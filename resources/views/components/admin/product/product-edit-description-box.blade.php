@props(['product' => new \App\Models\Product()])

<div class="row bg-white rounded-3 px-4 py-2 border border-1 border-white">
    <div class="col">
        <div class="row">
            <div class="col">
                <label for="title" class="text-start text-secondary">Title</label>
                <input id="title" name="title" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-100" placeholder="Black Titanium Ring" value="{{$product->title}}">
                <x-form-error name="title"></x-form-error>
            </div>

        </div>

        <div class="row mt-4">
            <div class="col">
                <label for="description" class="text-start text-secondary">Description</label>
                <textarea id="description" name="description" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-100" placeholder="Describe the specifications of your product">{{$product->description}}</textarea>
                <x-form-error name="description"></x-form-error>
            </div>

        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="mb-3">
                    <label for="images" class="form-label">Upload Images</label>
                    <input class="form-control" type="file" id="images" name="images[]" accept="image/*" multiple>
                </div>

                <x-form-error name="images"></x-form-error>
            </div>

        </div>

    </div>

</div>
