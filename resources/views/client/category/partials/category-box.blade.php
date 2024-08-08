<div class="col-md-3 mb-4">
    <div class="card shadow-sm h-100">

        {{-- Category Image --}}
        <img src="http://picsum.photos/seed/{{ rand(0,10000) }}/100/100" class="card-img-top rounded" alt="Placeholder Image">
        <div class="card-body text-center">

            {{-- Category Title --}}
            <a href="{{ route('client_category_products', $category) }}" class="text-black text-decoration-none">
                <h5 class="card-title mb-2">{{ $category->name }}</h5>
            </a>

            <a href="{{ route('client_category_products', $category) }}" class="btn text-white bg-black border-dark text-center">Browse Category</a>
        </div>
    </div>
</div>
