<div class="row bg-white rounded-3 px-4 py-2 border border-1 border-white">
    <div class="col">
        <div class="row">
            <div class="col">
                <label for="name" class="text-start text-secondary">Name</label>
                <input id="name" name="name" class="bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-100" placeholder="Rings">
                <x-form-error name="name"></x-form-error>
            </div>

        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="mb-3">
                    <label for="images" class="form-label">Upload Images</label>
                    <input class="form-control" type="file" id="images" name="images[]" accept="image/*" multiple>
                    <x-form-error name="images"></x-form-error>
                </div>

            </div>

        </div>

    </div>

</div>
