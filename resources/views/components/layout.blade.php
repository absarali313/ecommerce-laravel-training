<!doctype html>
<html lang="en">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <p  class="text-center my-2">Welcome to ShopEase</p>
    <hr>
    <nav >
        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
            <button class="nav-link text-black">Home</button>
            <button class="nav-link text-black">Profile</button>
            <button class="nav-link text-black">Contact</button>
       </div>
    </nav>

    {{$slot}}
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">logout</button>
        </form>
    @endauth
</body>
</html>
