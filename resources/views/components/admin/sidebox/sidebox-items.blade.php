@props(['icon' => '','link' => ''])

<div class='container-fluid rounded-2 hover-bg-light-gray'>
    <a href="{{ $link }}" class='text-decoration-none text-black'>
        <li class=' mt-md-3 mt-sm-1 w-100'>
            <p>
                <span class='{{ $icon }}' ])></span>

                {{ $slot }}
            </p>
        </li>
    </a>
</div>
