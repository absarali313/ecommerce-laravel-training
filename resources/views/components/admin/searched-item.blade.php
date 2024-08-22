@props(['category' => []])

<a href="{{ route('admin_category_edit', $category) }}" class="text-decoration-none hover-bg-offwhite">
    <div class="container rounded-3 bg-off-white border border-bottom-2 border-white mb-1 py-1 px-3">
        <div class="row d-flex justify-content-start align-items-center">
            <div class="col-2 d-flex align-items-center justify-content-center">
                <img class="rounded-3" src="{{ asset($category->image_path) }}" alt="category" style="width: 50px; height: 50px">
            </div>

            <div class="col-8 rounded-3 d-flex align-items-center justify-content-start">
                <p class="text-center mb-0">{{ $category->name }}</p>
            </div>
        </div>
    </div>
</a>
