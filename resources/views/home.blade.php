<x-admin.layout>
    <h1>Home Index Page Accessible to Everyone </h1>
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">logout</button>
        </form>
    @endauth
</x-admin.layout>
