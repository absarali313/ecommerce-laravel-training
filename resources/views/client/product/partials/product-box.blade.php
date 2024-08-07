<div class="col-md-3 mb-4">
    <div class="card shadow-sm h-100">
        {{-- Product Image --}}
        <a href="{{ url("/product/{$product?->id}") }}">
            <img src="http://picsum.photos/seed/{{rand(0,10000)}}/100/100" class="card-img-top rounded"  alt="Placeholder Image">
        </a>

        <div class="card-body text-center">
            {{-- Product Title --}}
            <a href="{{ url("/product/{$product['id']}") }}" class="text-black text-decoration-none">
                <h5 class="card-title mb-2">{{ $product?->title }}</h5>
            </a>

            {{-- Product Price--}}
            <div class="d-flex justify-content-center align-items-center">
                <p class="card-text fs-6 text-primary text-black text-center">Rs.{{ $product?->smallest_price?->price }}.00 PKR</p>
            </div>

            {{-- Add to Cart --}}
            <div class="d-flex justify-content-center mt-2">
                <a href="#" class="btn btn-primary bg-black border-dark w-100">Add to Cart </a>
            </div>
        </div>

    </div>
</div>
