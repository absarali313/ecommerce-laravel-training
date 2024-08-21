<x-admin.layout>
    <div x-data="{ open: false }">
        <div x-show="open" x-transition>
            Hello 👋
        </div>
    </div>


    @livewire('category.save-category' , [
        'category' => $category
    ])

    @push('script')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>

