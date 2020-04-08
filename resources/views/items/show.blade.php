@extends('layout.app')

@section('content')
    <div class="w-full px-8">

        <div class="w-full shadow bg-white my-8">
            <div class="bg-gray-100 px-5">
                <h1 class="text-xl text-left font-bold tracking-wider py-3 uppercase">
                    {{ $item->name }}
                </h1>
            </div>
            <div class="w-full flex flex-wrap p-5">
                <div class="w-1/6 flex items-center justify-start pr-3">
                    <div class="overflow-hidden rounded-lg w-64">
                        <img src="/images/keinBild.gif" alt="Item Picture" class="object-cover w-full h-auto">
                    </div>
                </div>
                <div class="w-5/6 flex">
                    <div class="w-1/4 tracking-wide text-lg font-medium">
                        <h3 class="text-gray-600 tracking-wide text-sm">Category</h3>
                        <a href="{{ $item->category->path() }}">
                            {{ $item->category->name }}
                        </a>

                        <h3 class="text-gray-600 tracking-wide text-sm mt-6">Manufacturer</h3>
                        <a href="{{ $item->manufacturer->path() }}">
                            {{ $item->manufacturer->name }}
                        </a>
                    </div>
                    <div class="w-1/4 tracking-wide text-lg font-medium">
                        <h3 class="text-gray-600 tracking-wide text-sm">Provider Code</h3>
                        {{ $item->provider_code ? $item->provider_code : '(empty)' }}

                        <h3 class="text-gray-600 tracking-wide text-sm mt-6">Item Case</h3>
                        <a href="{{ $item->itemCase->path() }}">
                            {{ $item->itemCase->name }}
                        </a>
                    </div>
                    <div class="w-1/4 tracking-wide text-lg font-medium">

                    </div>
                    <div class="w-1/4 tracking-wide text-lg font-medium">
                        <h3 class="text-gray-600 tracking-wide text-sm">Price per unit</h3>
                        {{ $item->price }} $
                    </div>
                </div>

                <div class="mt-8 tracking-wide text-lg font-medium">
                    <h3 class="text-gray-600 tracking-wide text-sm">Description</h3>
                    {{ $item->description }}
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold">Storage</h3>

            <stock locations="{{ $item->storageLocations->toJson()}}" item-id="{{ $item->id }}"></stock>
        </div>

    </div>
@endsection
