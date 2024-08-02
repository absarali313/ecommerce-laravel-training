@props(['category'])

<div
    class="row d-flex justify-content-between bg-white mt-2 border border-1 border-end-0 border-start-0 border-top-0  p-2">
    <div class="col-5">
        <div class="row flex justify-content-start align-items-center  ">
            <div class="col-5">
                <a href="/admin/category/edit/{{$category->id}}"><img src="{{asset($category->image_path)}}" alt="product"
                                                                     class="border border-1 rounded-3"
                                                                     style="width:50px; height:50px"></a>
            </div>
            <div class="col-7 flex justify-content-center align-content-center">
                <a class="text-center text-black text-decoration-underline"
                   href="/admin/products/edit/{{$category->id}}">{{$category->name}}</a>
            </div>
        </div>
    </div>

    <div class="col-2 flex justify-content-center align-content-center">
        <h6 class="text-center">1</h6>
    </div>
    <div class="col-2 flex justify-content-end align-items-center">
        <form method="POST" action="{{route('admin.category.destroy',$category)}}">
            @csrf
            @method('DELETE')
            <Button type="submit" class="text-center btn btn-danger rounded-3 mx-5">Delete</Button>
        </form>
    </div>
</div>
