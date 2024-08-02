<!doctype html>
<html lang="en">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .search-container {
            position: relative;
        }

        .search-container .form-control {
            width: 0;
            opacity: 0;
            transition: width 0.4s ease, opacity 0.4s ease;
            position: absolute;
            right: 0;
        }

        .search-container:hover .form-control {
            width: 200px;
            opacity: 1;
        }

        .search-icon {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <p  class="text-center my-2">Welcome to ShopEase</p>
    <hr>
{{--    <nav >--}}
{{--        <div  class="nav nav-tabs justify-content-center" role="tablist">--}}
{{--            <button class="nav-link text-black">Home</button>--}}
{{--            <button class="nav-link text-black">All Products</button>--}}
{{--            <button class="nav-link text-black">Rings</button>--}}
{{--            <button class="nav-link text-black">Bracelets</button>--}}
{{--            <button class="nav-link text-black">Neck Chain</button>--}}
{{--        </div>--}}

{{--        --}}{{--            <form class="d-flex me-0">--}}
{{--        --}}{{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--        --}}{{--                <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--        --}}{{--            </form>--}}
{{--        --}}{{--       </div>--}}

{{--    </nav>--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent my-0">
        <div class="container-fluid">
            <!-- Shop Name -->
            <a class="navbar-brand ms-5 fs-4" href="#">ShopEase</a>

            <!-- Navigation Tabs (Centered) -->
            <div class="collapse navbar-collapse justify-content-center">
                <div class="navbar-nav">
                    <button class="nav-link text-black">Home</button>
                    <button class="nav-link text-black">All Products</button>
                    <button class="nav-link text-black">Rings</button>
                    <button class="nav-link text-black">Bracelets</button>
                    <button class="nav-link text-black">Neck Chain</button>
                </div>
            </div>

            <!-- Search Form (Aligned to the right) -->
            <div class="search-container d-flex ">
                <i class="bi bi-search search-icon me-5" ></i>
                <form class="d-flex">
                    <input class="form-control me-5" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>
    <hr>
    {{$slot}}
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">logout</button>
        </form>
    @endauth
</body>
</html>
