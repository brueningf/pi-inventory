@extends('layout.app')

@section('content')

    <h3 class="text-xl font-bold text-center my-6">
        Store a new item
    </h3>

    <form action="/items" method="POST" class="w-4/5 mt-6 mx-auto" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="mb-6">
            <label for="name">Name / Alias *</label>
            <input type="text" name="name" placeholder="e.g. Example item" required>
        </div>
        <div class="mb-6 w-1/2">
            <label for="image">Image</label>
            <input type="file" name="image">
        </div>
        <div class="flex items-start flex-col md:flex-row md:flex-wrap mb-6">
            <div class="w-1/2 md:w-1/4 md:pr-3 relative">
                <label for="category_id">Category *</label>

                <select name="category_id" class="shadow px-3 py-2" required>
                    <option value="" disabled selected>Select a category</option>

                    @foreach ($availableCategories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
            <div class="w-1/2 md:w-1/4 px-3 relative">
                <label for="manufacturer_id">Item Case *</label>
                <select name="item_case_id" class="shadow px-3 py-2" required>
                    <option value="" disabled selected class="text-gray-700">Select an case</option>

                    @foreach ($itemCases as $itemCase)
                        <option value="{{ $itemCase->id }}">
                            {{ $itemCase->name }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
            <div class="w-1/2 md:w-1/4 px-3 relative">
                <label for="manufacturer_id">Manufacturer</label>
                <select name="manufacturer_id" class="shadow px-3 py-2">
                    <option value="" disabled selected class="text-gray-700">Select a manufacturer</option>

                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">
                            {{ $manufacturer->name }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
            <div class="w-1/2 md:w-1/4 px-3">
                <label for="provider_code">Provider code</label>
                <input type="text" name="provider_code" placeholder="e.g. STMM001">
            </div>
            <div class="w-1/2 md:w-1/4 md:px-0 md:mt-6 px-3">
                <label for="price">$ Price per unit *</label>
                <input type="number" min="0.00" max="10000.00" step="0.01" name="price" placeholder="0.00" required/>
            </div>
        </div>
        <div class="mb-6">
            <label for="description">Description</label>
            <textarea name="description" rows="5" placeholder="e.g. Fancy example item"></textarea>
        </div>

        <div class="mb-6">
            <label for="datasheet">Datasheet Path</label>
            <input type="text" name="datasheet" placeholder="C:/Datasheets/ExampleItemDatasheet.pdf">
        </div>


        <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit">Create item</button>
    </form>

@endsection
