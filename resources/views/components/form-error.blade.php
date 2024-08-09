@props(['name'])

@error($name)
    <p class='font-monospace text-warning mt-1'>{{ $message }}</p>
@enderror
