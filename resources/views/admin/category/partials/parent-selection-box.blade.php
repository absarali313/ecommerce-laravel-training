<div class="col">
    <div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white">
        <div class="col">
            <div class="row">
                <div class="col">
                    <label for="parent" class="text-start text-secondary">Parent Category</label>

                    <select id="parent" name="parent" class="form-select">
                        <option></option>
                         @foreach($categories as $parentCategory)
                            <option value="{{ $parentCategory?->name }}" @selected($parentCategory == $category?->parent) >{{ $parentCategory->name }}</option>
                         @endforeach
                    </select>

                    <x-form-error name="parent" />
                </div>
            </div>
        </div>
    </div>
</div>
