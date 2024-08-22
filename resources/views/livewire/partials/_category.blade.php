<div class="row d-flex justify-content-start list-group list-group-flush" x-data="{ expanded: false }">
    <li class="list-group-item border border-bottom-0 border-start-0 border-end-0 hover-bg-offwhite" >
         <div class="row d-flex ">
            <div class="col-10">
                <input class="form-check-input" type="checkbox" wire:click="toggleSelectedCategory({{$category->id}})" name="category-{{$category->id}}" @checked(in_array($category->id,$selectedCategory)) id="{{$category->id}}">
                <label class="form-check-label" for="category-{{ $category->id }}"> {{ $category->name }} </label>
            </div>

             @if($category->children->isNotEmpty())
                 <div class="col-1 fa fa-plus" @click="expanded = !expanded"/>
             @endif
         </div>
    </li>

    @if($category->children->isNotEmpty())
        <div x-show="expanded" x-collapse.duration.100ms>
            <ul>
                @foreach($category->children as $child)
                    @include('livewire.partials._category', [
                        'category' => $child
                    ])
                @endforeach
            </ul>
        </div>
    @endif
</div>
