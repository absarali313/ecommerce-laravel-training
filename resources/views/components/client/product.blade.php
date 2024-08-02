@props(['product'=> null])


<div class="col-md-3 mb-4">
    <div class="card shadow-sm h-100">
        <img src="http://picsum.photos/seed/{{rand(0,10000)}}/100/100" class="card-img-top rounded" alt="Placeholder Image">
        <div class="card-body text-center">
            <h5 class="card-title mb-2">{{$product->title}}</h5>
            <div class="d-flex flex-row">
                <p class="card-text fs-6 text-primary text-black mb-0 mt-2">Rs.{{$product->smallest_price->price}}.00 PKR</p>
                <a href="{{ url("/product/{$product['id']}") }}" class="btn btn-primary bg-black border-dark ms-5 me-0">CART</a>
            </div>
              </div>
    </div>
</div>
