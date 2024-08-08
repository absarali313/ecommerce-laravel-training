<x-admin.layout>
    <div @class(["container-fluid my-5 "])>
        {{--Product Edit Block--}}
        @include('admin.product.partials.edit-product-form')
        {{--Product Images Block--}}
        @include('admin.product.partials.edit-images-form')
        {{--Product Sizes Block--}}
        @include('admin.product.partials.edit-size-form')
        {{--Product Related Products Block--}}
        @include('admin.product.partials.edit-relatedproducts-form')
    </div>
    @stack('tinymce')
</x-admin.layout>

