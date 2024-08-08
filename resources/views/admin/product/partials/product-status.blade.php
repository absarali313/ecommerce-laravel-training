@props(['visible' => false])

<h6 @class([
        'text-center p-1 rounded-4',
        'bg-success text-white w-auto' => $visible,
        'bg-secondary text-white w-auto' => ! $visible,
        'box-style'
    ])>
    {{ $visible ? 'Active' : 'Inactive' }}
</h6>
