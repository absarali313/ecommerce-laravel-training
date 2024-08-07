@props(['categories' => [], 'selectedCategories' => [] ])

<x-admin.layout>
    @include('admin.product.partials.create-product-form')
    @stack('scripts')
</x-admin.layout>
@push('scripts')
    <script>
        tinymce.init({
            selector: '#description',  // The ID of your textarea
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            height: 300
        });
    </script>
@endpush

