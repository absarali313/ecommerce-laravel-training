 <div class="container-fluid my-5 ">
     {{--Product Edit Block--}}
     <form id="categoryForm" wire:submit="save()" enctype="multipart/form-data">
         @method('PATCH')
         @csrf
         {{--Back Button--}}
         <x-admin.back-button :link="'admin_categories'"/>

         <!-- Modal -->
         @include('livewire.add-product-to-category')

         {{--Form Header--}}
         @if(request()->route()->getName() === 'admin_category_edit')
             <x-admin.header class="mx-4" :has-action="true" wire:ignore.self >Edit Category</x-admin.header>
         @else(request()->route()->getName() === 'admin_category_create')
             <x-admin.header class="mx-4" :has-action="true" wire:ignore.self>Add Category</x-admin.header>
         @endif

        <div class="row d-flex justify-content-around mt-1 p-1 ">
            {{--Categories--}}
            <div class="col-7">
                @include('admin.category.partials.description-box')
            </div>

            {{--Visibility--}}
            <div class="col-3">
                @include('admin.category.partials.parent-selection-box')
                <!-- Button to trigger modal -->
                <button type="button" class="d-flex w-100 mt-3 justify-content-center btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add products</button>
            </div>
        </div>
    </form>

     @if(isset($this->categoryForm->category))
         <x-admin.image-card :action_route="'admin_category_image_delete'" :item="$this->categoryForm->category" />
     @endif
</div>

