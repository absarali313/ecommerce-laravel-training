@props(['action_route' => '', 'item' => null])

@if($item->image_path)
<div class='container d-flex rounded-3 px-5 py-2 border border-1 border-white' ])>
    <div class='col-3 d-flex justify-content-center' >
        <div class="card" style="width: 20rem;">
            <div class="card-body d-flex justify-content-end">
                <form id="image_delete_btn" method="POST" action="{{ route($action_route , $item) }}">
                    @csrf
                    @method('DELETE')
                    <button form="image_delete_btn" class="btn border-2 border-secondary rounded-5"> X </button>
                </form>
            </div>
            <img src="{{ asset($item->image_path) }}" class="card-img-top" alt="...">
        </div>
    </div>
</div>
@endif
