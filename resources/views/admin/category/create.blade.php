<x-admin.layout>
    <div class="container-fluid my-5 ">
        <form method="POST" action="{{ route('admin_categories') }}" enctype="multipart/form-data">
            @csrf
            <x-admin.back-button :link="'admin_categories'"/>

            <x-admin.header :has-action="true" :action-btn="'Save'"> Add Category </x-admin.header>

            <div class="row d-flex justify-content-around mt-1 p-1 ">
                {{-- Title & Description --}}
                <div class="col-7">
                    <x-admin.Category.category-description-box/>
                </div>

                <div class="col-3">
                    {{-- Parent Category Selection Box --}}
                    @include('admin.category.partials.parent-selection-box', [
                        'category' => null,
                    ])
                </div>
            </div>
        </form>
    </div>
</x-admin.layout>



