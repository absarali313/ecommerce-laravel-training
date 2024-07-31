<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">


</head>
<body style="margin:0; padding:0">
<div style="background: white">
    <nav>
        <div class="container-fluid text-center bg-light-black h-auto">
            <div class="row align-content-center justify-content-between mx-md-2 py-1 ">

                <div class="col-md-2 col-sm-4 d-sm-flex justify-content-center align-items-center ">
                    <x-admin.nav-header href="#">Planet Silver</x-admin.nav-header>
                </div>
                <div class="col-md-5 d-none d-md-block h-auto align-content-center">
                    <x-admin.search-box></x-admin.search-box>
                </div>
                <div class="col-md-2 col-sm-4 d-flex justify-content-end align-items-center text-center">
                    <div class="row w-auto">
                        <div class="col-md-4 col-sm-4 d-flex align-items-center justify-content-end">
                            <button
                                class="bg-light-black border-0 text-secondary hover-bg-dark-gray">
                                <i class="fas fa-bell"></i>
                            </button>
                        </div>
                        <div class="col-8 d-none d-md-block  d-flex align-items-center">
                            <x-admin.profile>Admin</x-admin.profile>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<main>

    {{$slot}}

</main>

</body>
</html>
