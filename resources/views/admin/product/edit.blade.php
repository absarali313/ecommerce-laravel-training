<x-admin.layout>
    <div class="container-fluid my-5 ">
        {{--Product Edit Block--}}
        @include('admin.product.partials.edit-product-form')
        {{--Product Images Block--}}
        @include('admin.product.partials.edit-images-form')
        {{--Product Sizes Block--}}
        @include('admin.product.partials.edit-size-form')
        {{--Product Related Products Block--}}
        @include('admin.product.partials.edit-relatedproducts-form')
    </div>
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
