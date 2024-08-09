<x-admin.layout>
    <div class="container-fluid my-5 ">
        <form method="POST" action="{{ route('admin_categories') }}" enctype="multipart/form-data">
            @csrf
            <x-admin.header :has-action="true" :action-btn="'Save'"> Add Category </x-admin.header>

            <div class="row d-flex justify-content-around mt-1 p-1 ">
                {{-- Title & Description --}}
                <div class="col-7">
                    <x-admin.Category.category-description-box/>
                </div>

                {{-- Parent Category Selection Box --}}
                <div class="col-3">
                    <div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="parent" class="text-start text-secondary">Parent Category</label>

                                    <select id="parent" name="parent" class="form-select">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}" >{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-form-error name="parent" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin.layout>



