<x-admin.layout>
    <div class="container-fluid my-5 ">
        {{--Product Edit Block--}}
        <form id="categoryForm" method="POST" action="{{ route('admin_category_update', $category) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            {{--Back Button--}}
            <x-admin.back-button :link="'admin_categories'"/>

            {{--Form Header--}}
            <x-admin.header class="mx-4" :has-action="true" >Edit Category</x-admin.header>

            <div class="row d-flex justify-content-around mt-1 p-1 ">
                {{--Categories--}}
                <div class="col-7">
                    @include('admin.category.partials.description-box')
                </div>

                {{--Visibility--}}
                <div class="col-3">
                    @include('admin.category.partials.parent-selection-box')
                </div>
            </div>
        </form>

        <x-admin.image-card :action_route="'admin_category_image_delete'" :item="$category" />
    </div>

    @push('script')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>

