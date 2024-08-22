<x-admin.layout>
    <livewire:category.manage-category :category="$category" />

    @push('script')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush
</x-admin.layout>

