@extends('layout.app')

@section('content')
    <div class="w-full px-8">
        <h1 class="text-2xl text-left font-bold tracking-wider py-3 text-uppercase">
            {{ $item->name }}
        </h1>
        <div class="w-full flex flex-wrap mb-8 p-5 shadow bg-white">
            <div class="w-1/6 flex items-center justify-start">
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

        <stock locations="{{ $item->storageLocations->toJson()}}" item-id="{{ $item->id }}"></stock>

    </div>
@endsection
