@extends('layout.app')

@section('content')

<div class="p-6">
    <h3 class="text-xl font-bold mt-6">Recently updated items</h3>
    <div class="w-full flex flex-wrap my-6">
        @foreach ($recentEditedItems as $item)
            <div class="w-1/5 pr-3 pb-3">
                <a href="{{ $item->path() }}" class="flex relative border rounded-lg overflow-hidden h-32">
                    <div class="w-1/3">
                        <img class="object-cover h-full w-full" src="{{ $item->imagePath() }}" alt="Item">
                    </div>
                    <div class="w-2/3 p-2">
                        <div class="font-semibold">
                            {{ $item->name }}
                        </div>
                        <div class="text-blue-700">
                            {{ $item->description }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <h3 class="text-xl font-bold mt-6">Recently added items</h3>
    <div class="w-full flex flex-wrap my-6">
        @foreach ($items as $item)
        <div class="w-1/5 pr-3 pb-3">
            <a href="{{ $item->path() }}" class="flex relative border rounded-lg overflow-hidden h-32">
                <div class="w-1/3">
                    <img class="object-cover h-full w-full" src="{{ $item->imagePath() }}" alt="Item">
                </div>
                <div class="w-2/3 p-2">
                    <div class="font-semibold">
                        {{ $item->name }}
                    </div>
                    <div class="text-blue-700">
                        {{ $item->description }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <h3 class="text-xl font-bold mt-6">Manufacturer</h3>
    <div class="w-full flex flex-wrap mt-6 pb-16 block">
        @foreach ($manufacturers as $manufacturer)
        <div class="w-1/5 mt-3 pr-3">
            <a href="{{ $manufacturer->path() }}" class="w-full block p-2 font-bold text-center border rounded hover:bg-blue-100">
                {{ $manufacturer->name }}
            </a>
        </div>
        @endforeach
    </div>
</div>



@endsection
