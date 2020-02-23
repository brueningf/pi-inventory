<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PI - Inventory</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
    <div id="app">
        <header>
            <div class="w-full bg-repeat bg-yellow-100 flex items-center justify-around mx-auto py-4" style="background-image: url(/images/circuit-board.svg)">
                <div class="w-1/2 flex items-center justify-center">
                    <a href="/" class="text-black bg-yellow-100 px-3 py-2 rounded-full text-4xl font-black">
                        PI | Inventory
                    </a>
                </div>
                <div class="flex items-center justify-center w-1/2">
                    <div class="w-64 relative">
                        <form action="/search" method="POST" class="flex items-center justify-center">
                            {{ csrf_field() }}
                            <input class="pl-8" type="search" name="q" placeholder="Search items">
                            <button type="submit">
                                <zondicon icon="search" class="fill-current text-red-700 w-4 pointer-events-none absolute inset-y-0 left-0 mt-3 ml-2"></zondicon>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full bg-red-600 flex items-center justify-around mx-auto">
                <div class="flex items-center justify-center w-1/2">
                    <a class="flex px-4 py-3 cursor-pointer text-white hover:bg-gray-200" href="/items/create">
                        <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
                        New Item
                    </a>
                    <a class="flex px-4 py-3 cursor-pointer text-white hover:bg-gray-200" href="/providers/create">
                        <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
                        New Provider
                    </a>
                    <a class="flex px-4 py-3 cursor-pointer text-white hover:bg-gray-200" href="/categories">
                        <zondicon icon="bookmark" class="fill-current w-5 mr-2"></zondicon>
                        Categories
                    </a>
                </div>
            </div>
        </header>

        <div class="flex min-h-screen">
            <div class="w-1/5 bg-gray-200 shadow">
                <h3 class="py-4 pl-4 border-b-2 border-black font-bold text-2xl mb-0">Categories</h3>
                <sidemenu :categories="{{ json_encode($categories) }}"></sidemenu>
            </div>
            <div class="w-4/5 bg-yellow-100 shadow">
                @yield('content')
            </div>
        </div>

        <footer class="relative w-full flex flex-col items-center justify-end bg-repeat" style="background-image: url(/images/circuit-board.svg);background-color: rgba(210,0,0,.5);" >
            <div class="w-full flex justify-center items-center">
                <div class="p-12">
                    <h5 class="text-xl text-left border-b-2 mb-3">Index</h5>
                    <div>
                        <a class="block py-2" href="/categories">Categories</a>
                        <a class="block py-2" href="/manufacturers">Manufacturers</a>
                        <a class="block py-2" href="/item-cases">Item Cases</a>
                        <a class="block py-2" href="/storage-locations">Storage</a>
                    </div>
                </div>
                <div class="p-12">
                    <h5 class="text-xl text-left border-b-2 mb-3">Index</h5>
                    <div>
                        <a class="block py-2" href="/categories">Categories</a>
                        <a class="block py-2" href="/manufacturers">Manufacturers</a>
                        <a class="block py-2" href="/item-cases">Item Cases</a>
                        <a class="block py-2" href="/storage-locations">Storage</a>
                    </div>
                </div>
            </div>
            <div class="w-full flex items-center justify-center bg-gray-100 py-1">
                Made by <a class="mx-1" href="https://fredesk.com">fb</a> |
                <zondicon icon="bolt" class="fill-current text-red-500 w-5 mx-1"></zondicon>
                for PI
            </div>
        </footer>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>