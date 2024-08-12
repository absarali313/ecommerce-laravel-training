<h6 @class([
        'text-center p-1 rounded-4',
        'bg-success text-white w-auto' => $product->isVisible(),
        'bg-secondary text-white w-auto' => $product->isHidden(),
        'box-style'
    ])>
    {{ $product->getVisibilityStatus() }}
</h6>
