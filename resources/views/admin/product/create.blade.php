@props(['categories' => [], 'selectedCategories' => [] ])

<x-admin.layout>
    @include('admin.product.partials.create-product-form')
    @stack('tinymce')
</x-admin.layout>
