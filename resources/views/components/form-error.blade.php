@props(['name'])

@error($name)
    <p class='font-monospace small-text text-danger mt-1'>{{ $message }}</p>
@enderror
