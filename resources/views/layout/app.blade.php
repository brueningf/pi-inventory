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
            <div class="w-full bg-gray-100 flex items-center justify-around mx-auto py-4">
                <div class="w-1/2 flex items-center justify-center">
                    <a href="/" class="text-red-700 text-lg font-bold">
                        PI | Inventory
                    </a>
                </div>
                <div class="flex items-center justify-center w-1/2">
                    <div class="w-48 relative">
                        <form action="/search" method="POST" @enter>
                            {{ csrf_field() }}
                            <input class="pl-8" type="search" name="q" placeholder="Search items">
                            <button type="submit">
                                <zondicon icon="search" class="fill-current text-red-700 w-4 pointer-events-none absolute inset-y-0 left-0 mt-3 ml-2"></zondicon> 
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full bg-gray-100 flex items-center justify-around mx-auto">
                <div class="flex items-center justify-center w-1/2">
                    <a class="flex px-4 py-3 cursor-pointer hover:text-red-400 hover:bg-white" href="/items/create">
                        <zondicon icon="add-solid" class="fill-current text-red-500 w-5 mr-2"></zondicon> 
                        Item
                    </a>
                    <a class="flex px-4 py-3 cursor-pointer hover:text-red-400 hover:bg-white" href="/categories/create">
                        <zondicon icon="add-solid" class="fill-current text-red-500 w-5 mr-2"></zondicon> 
                        Category
                    </a>
                    <a class="flex px-4 py-3 cursor-pointer hover:text-red-400 hover:bg-white" href="/providers/create">
                        <zondicon icon="add-solid" class="fill-current text-red-500 w-5 mr-2"></zondicon> 
                        Provider
                    </a>
                </div>
            </div>

        </header>

        <div class="min-h-screen mx-5">
            @yield('content')
        </div>
    
        <footer class="w-full bg-gray-200 flex items-center p-2">
            Made by <a class="mx-1" href="https://fredesk.com">FB</a> with 
            <zondicon icon="heart" class="fill-current text-red-500 w-5 mx-1"></zondicon> 
            for PI
        </footer>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>