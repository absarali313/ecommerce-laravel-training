@props(['categories' => [], 'selectedCategories' => []])

<div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white mt-4">
    <div class="row">
        <div class="col">
            <p class="text-start text-secondary">Categories</p>
            <div id="categories" class="form-check">

                @foreach($categories as $category)
                    <div class="form-check">

                        <input class="form-check-input" type="checkbox"
                               id="category-{{ $category->id }}" name="categories[]"
                               value="{{ $category->id }}"/>

                        <label class="form-check-label" for="category-{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <x-form-error name="categories"></x-form-error>
        </div>
    </div>
</div>
