{{--@include('components.admin.product.partials.head');--}}<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    <script src="https://cdn.tiny.cloud/1/v4437h8gvq2ak03n506ro895c5i9gmgr5xnnsgjpfttf8uqd/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireStyles
    @stack('script')
</head>
<body class='no-margin'>
    <div class='div-style'>
        <nav>
            <div class= 'container-fluid text-center bg-light-black h-auto' >
                <div class='row align-content-center justify-content-between mx-md-2 py-1 ' >
                    <div class= 'col-md-2 col-sm-4 d-sm-flex justify-content-center align-items-center ' >
                        <x-admin.nav-header href="#">Planet Silver</x-admin.nav-header>
                    </div>

                    <div class= 'col-md-5 d-none d-md-block h-auto align-content-center' >
                        <x-admin.search-box/>
                    </div>

                    <div class= 'col-md-2 col-sm-4 d-flex justify-content-end align-items-center text-center' >
                        <div class= 'row w-auto' >
                            <div class= 'col-md-4 col-sm-4 d-flex align-items-center justify-content-end' >
                                <button class= 'bg-light-black border-0 rounded-3 text-secondary hover-bg-dark-gray' >
                                    <i class= 'fas fa-bell' ></i>
                                </button>
                            </div>

                            <div class= 'col-8 d-none d-md-block  d-flex align-items-center' >
                                <x-admin.profile>Admin</x-admin.profile>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main>
        <div class= 'container-fluid d-flex flex-column min-vh-100' >
            <div class= 'row flex-grow-1' >
                <div class= 'col-md-2 d-none d-md-block 4 bg-light-gray d-flex align-items-center justify-content-start' >
                    <x-admin.sidebox.sidebox/>
                </div>

                <div class= 'col-md-10 bg-off-white' > {{ $slot }} </div>
            </div>
        </div>
    </main>
</body>

@livewireScripts
</html>

