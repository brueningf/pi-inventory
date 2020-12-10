<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PI - Inventory</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/fontawesome.css">

</head>

<body>
<a name="top"></a>

<div id="app" class="text-gray-400">
    <header>
        <div class="w-full bg-red-800 flex items-center justify-start mx-auto h-10">
            <div v-show="showMenu"
                 class="menu absolute top-0 left-0 mt-10 bg-black z-10 sm:relative sm:mt-0 sm:bg-transparent sm:flex items-center justify-center">
                <a class="flex px-4 py-3 sm:py-2 cursor-pointer text-gray-300 focus:bg-blue-400 hover:bg-gray-400 {{ ! request()->is('/') ?: 'text-gray-700 bg-gray-400' }}"
                   href="/">Home</a>
                <a class="flex px-4 py-3 sm:py-2 cursor-pointer text-gray-300 focus:bg-blue-400 hover:bg-gray-400 {{ ! request()->is('item-cases') ?: 'text-gray-700 bg-gray-400' }}"
                   href="/item-cases">Item Cases</a>
                <a class="flex px-4 py-3 sm:py-2 cursor-pointer text-gray-300 focus:bg-blue-400 hover:bg-gray-400 {{ ! request()->is('manufacturers') ?: 'text-gray-700 bg-gray-400' }}"
                   href="/manufacturers">Manufacturers</a>
                <a class="flex px-4 py-3 sm:py-2 cursor-pointer text-gray-300 focus:bg-blue-400 hover:bg-gray-400 {{ ! request()->is('categories') ?: 'text-gray-700 bg-gray-400' }}"
                   href="/categories">Categories</a>
                <a class="flex px-4 py-3 sm:py-2 cursor-pointer text-gray-300 focus:bg-blue-400 hover:bg-gray-400 {{ ! request()->is('projects') ?: 'text-gray-700 bg-gray-400' }}"
                   href="/projects">Projects</a>
                <a class="flex px-4 py-3 sm:py-2 cursor-pointer text-gray-300 focus:bg-blue-400 hover:bg-gray-400"
                   href="#add-menu">
                    <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
                    Create
                </a>

            </div>
            <div class="sm:hidden px-5 py-2 max-w-24" @click="toggleMenu">
                <zondicon icon="menu" class="w-6 h-8"></zondicon>
            </div>
            <div class="flex-1 w-1/3 bg-red-900 h-full flex items-center">
                @if(request()->routeIs('categories.show') && isset($category))
                    <div class="w-full flex items-center justify-between font-extrabold text-sm sm:text-2xl px-3">
                        <span>{{ $category->name }}</span>
                        <span>{{ $category->items->count() }} items</span>
                    </div>
                @endif
            </div>
            <a class="block px-4 py-3" href="#search" @click="$modal.show('search')">
                <zondicon icon="search"
                          class="fill-current w-6 h-6"></zondicon>
            </a>
            <div>
                <div class="flex items-center justify-between px-4 py-3 text-gray-300 bg-gray-700">
                    <span class="hidden sm:block mr-2">Backup</span>
                    <zondicon @if(config('backup_health.checked')) icon="checkmark-outline"
                              @else icon="exclamation-outline" @endif
                              class="w-5 h-5 fill-current mr-1 @if(config('backup_health.checked')) text-green-500 @else text-yellow-500 @endif"></zondicon>
                </div>
            </div>
        </div>
    </header>

    <div class="w-full max-w-full flex min-h-screen">
        <sidemenu :categories="{{ json_encode($categories) }}"></sidemenu>
        <div class="flex-1 bg-gray-800 shadow px-4 pb-6">
            @yield('content')
        </div>
    </div>

    <footer class="relative w-full flex flex-col items-center justify-end bg-repeat bg-gray-700"
            style="background-image: url(/images/circuit-board.svg)">
        <div class="w-full flex justify-center items-center">
            <div class="p-12">
                <h5 class="text-xl text-left border-b-2 mb-3 font-bold">Index</h5>
                <div class="font-semibold">
                    <a class="block py-2" href="/categories">Categories</a>
                    <a class="block py-2" href="/manufacturers">Manufacturers</a>
                    <a class="block py-2" href="/item-cases">Item Cases</a>
                    <a class="block py-2" href="/storage-locations">Storage</a>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center bg-gray-600 py-1">
            Made by <a class="mx-1" href="https://fredesk.com">fb</a> |
            <zondicon icon="bolt" class="fill-current text-red-500 w-5 mx-1"></zondicon>
            for PI
        </div>
    </footer>

    <modal name="add-menu">
        <div>
            <a class="block px-3 py-2 bg-gray-100 text-black hover:bg-red-500 hover:text-white" href="/items/create">Item</a>
            <a class="block px-3 py-2 bg-gray-100 text-black hover:bg-red-500 hover:text-white"
               href="/categories/create">Category</a>
            <a class="block px-3 py-2 bg-gray-100 text-black hover:bg-red-500 hover:text-white"
               href="/manufacturers/create">Manufacturer</a>
            <a class="block px-3 py-2 bg-gray-100 text-black hover:bg-red-500 hover:text-white"
               href="/item-cases/create">Item Case</a>
        </div>
    </modal>

    <modal name="search">
        <div class="text-black p-8">
            <form action="/search" method="POST" class="flex items-center justify-center py-1 relative">
                {{ csrf_field() }}
                <input style="padding: 1rem 1rem 1rem 2rem" type="search" name="q" placeholder="Search items">
                <button type="submit">
                    <zondicon icon="search"
                              class="fill-current text-red-700 w-5 pointer-events-none absolute inset-y-0 left-0 mt-5 ml-2"></zondicon>
                </button>
            </form>
        </div>
    </modal>

</div>
<script src="{{ mix('/js/app.js') }}"></script>

@yield('footer')
@if(session()->has('success'))
    <script>
        toast.fire({
            title: '{{ session('success') }}',
            icon: 'success'
        })
    </script>
@endif

@if(session()->has('error'))
    <script>
        swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
    </script>
@endif

<script>
    let table = document.querySelector('#items-table')

    if (table) {
        const dt = new DataTable(table, { paging: false })
    }
</script>

</body>

</html>
