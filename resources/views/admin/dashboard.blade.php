<x-admin.layout>
    <div class="container-fluid d-flex flex-column min-vh-100">
        <div class="row flex-grow-1">
            <div class="col-md-2 d-none d-md-block 4 bg-light-gray d-flex align-items-center justify-content-start">
                <x-admin.sidebox/>
            </div>
            <div class="col-md-9 d-flex align-items-center justify-content-center">
                {{$slot}}
            </div>
        </div>
    </div>
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">logout</button>
        </form>
    @endauth
</x-admin.layout>
