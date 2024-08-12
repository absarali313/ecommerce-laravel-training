@props(['relatedProduct' => [] ])

<div @class([ 'col mx-5' ])>
    <label for="product_id" @class([ 'text-start text-secondary' ])>Product ID</label>
    <label @class([ 'bg-white-50 border border-opacity-25 border-black rounded-2 px-2 form-label' ]) >{{ $relatedProduct->pivot->product_id }}</label>
    <input type="hidden" name="product_id" value="{{ $relatedProduct->pivot->product_id }}">

{{--    <x-form-error name="product_id"/>--}}

    <label for="related_product_id" @class([ 'mx-2 text-start text-secondary' ])>Related ID</label>
    <input id="related_product_id" name="related_product_id" type="number" @class([ 'bg-white-50 border border-opacity-25 border-black rounded-2 px-2 w-10 form-label' ]) value={{ $relatedProduct->pivot->related_product_id }}>

{{--    <x-form-error name="related_product_id"/>--}}
</div>
