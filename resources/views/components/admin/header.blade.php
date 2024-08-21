@props(['hasAction' => false, 'actionBtn' => 'Save', 'link' => ''])

<div @class([
        "row", "d-flex", "justify-content-around",
        "mx-4" => $hasAction,
      ])
>
    <div class="col-6">
        <h4>{{ $slot }}</h4>
    </div>

    <div class="col-6 d-flex justify-content-end ">
        @if( $hasAction )
            <button type="submit" class="btn btn-gray rounded-2 mx-1 ">{{ $actionBtn }}</button>
        @else
            <a href="{{ route($link) }}" class="btn btn-gray rounded-2 mx-1 ">{{ $actionBtn }}</a>
        @endif
    </div>
</div>
