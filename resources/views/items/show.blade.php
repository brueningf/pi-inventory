@extends('layout.app')

@section('content')
    <div class="w-full px-8">
        <div class="w-full shadow bg-white my-8">
            <div class="flex justify-between items-center bg-gray-100 px-5 py-2 border-b">
                <h1 class="text-xl text-left font-bold tracking-wider py-3 uppercase">
                    {{ $item->name }}
                </h1>

                @include('components.actions', ['model' => $item])
            </div>
            <div class="w-full flex flex-wrap px-5 py-8">
                <div class="w-1/6 flex items-center justify-start pr-3">
                    <div class="overflow-hidden rounded-lg w-64">
                        <img src="{{ $item->imagePath() }}" alt="Item Picture" class="object-cover w-full h-auto">
                    </div>
                </div>
                <div class="w-5/6 flex">
                    <div class="w-1/4 tracking-wide text-lg font-medium">
                        <h3 class="text-gray-600 tracking-wide text-sm">Category</h3>
                        <a href="{{ $item->category->path() }}">
                            {{ $item->category->name }}
                        </a>

                        <h3 class="text-gray-600 tracking-wide text-sm mt-6">Manufacturer</h3>
                        <a href="{{ optional($item->manufacturer)->path() }}">
                            {{ optional($item->manufacturer)->name }}
                        </a>
                    </div>
                    <div class="w-1/4 tracking-wide text-lg font-medium">
                        <h3 class="text-gray-600 tracking-wide text-sm">Provider Code</h3>
                        {{ $item->provider_code ? $item->provider_code : '(not specified)' }}

                        <h3 class="text-gray-600 tracking-wide text-sm mt-6">Item Case</h3>
                        <a href="{{ $item->itemCase->path() }}">
                            {{ $item->itemCase->name }}
                        </a>
                    </div>
                    <div class="w-1/4 tracking-wide text-lg font-medium">
                        <h3 class="text-gray-600 tracking-wide text-sm">Datasheet</h3>
                        <a href="{{ 'file:///' . $item->datasheet }}" target='_blank'>
                            {{ $item->datasheet ?? 'No datasheet' }}
                        </a>
                    </div>
                    <div class="w-1/4 tracking-wide text-lg font-medium">
                        <h3 class="text-gray-600 tracking-wide text-sm">Price per unit</h3>
                        {{ $item->price }} $
                    </div>
                </div>

                <div class="mt-8 tracking-wide text-lg font-medium">
                    <h3 class="text-gray-600 tracking-wide text-sm">Description</h3>
                    {{ $item->description ?? 'No description yet'}}
                </div>
            </div>
        </div>

        @if($item->attributes->count())
            <div class="w-full shadow bg-white my-8">
            <div class="flex justify-between items-center bg-gray-100 px-5 py-2 border-b">
                <h1 class="text-xl text-left font-bold tracking-wider py-3 uppercase">
                    Attributes
                </h1>
            </div>

            <div class="w-full flex flex-wrap px-5 py-8">
                @foreach($item->attributes as $attribute)
                    {{ $attribute->name }} : {{ $attribute->value }}
                @endforeach
            </div>
        </div>
        @endif


        <div>
            <h3 class="text-xl font-semibold">Storage</h3>

            <stock locations="{{ $item->storageLocations->toJson()}}" item-id="{{ $item->id }}"></stock>
        </div>

    </div>
@endsection
