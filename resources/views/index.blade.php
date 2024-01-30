@extends('layout.app')

@section('content')
    <div class="p-2 sm:p-6 mt-5">
        <div class="flex items-start justify-start flex-wrap">
            @foreach($categories as $category)
                <a class="w-1/2 sm:w-1/6 border border-gray-500 overflow-hidden py-2 px-3 bg-gray-600 hover:bg-gray-400 text-white hover:text-gray-200 text-left" href="{{ $category->path() }}">
                   {{ $category->name }}
                </a>
            @endforeach
        </div>
        <h3 class="text-xl font-bold mt-6 flex items-center justify-between">
            <span>Recently updated items</span>
            <span class="flex items-center justify-between text-gray-300">
                <span class="hidden sm:block mr-2">Backup</span>
                <zondicon @if(config('backup_health.checked')) icon="checkmark-outline"
                          @else icon="exclamation-outline" @endif
                          class="w-5 h-5 fill-current mr-1 @if(config('backup_health.checked')) text-green-500 @else text-yellow-500 @endif"></zondicon>
            </span>
        </h3>
        <div class="w-full flex flex-wrap my-6">
            @foreach ($recentEditedItems as $item)
                <div class="w-1/2 sm:w-1/5 pr-3 pb-3">
                    <a href="{{ $item->path() }}" class="flex relative border rounded-lg overflow-hidden h-32">
                        <div class="w-1/3">
                            <img class="object-cover h-full w-full" src="{{ $item->imagePath() }}" alt="Item">
                        </div>
                        <div class="w-2/3 p-2">
                            <div class="font-semibold">
                                {{ $item->name }}
                            </div>
                            <div class="text-gray-300 truncate">
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
                <div class="w-1/2 sm:w-1/5 pr-3 pb-3">
                    <a href="{{ $item->path() }}" class="flex relative border rounded-lg overflow-hidden h-32">
                        <div class="w-1/3">
                            <img class="object-cover h-full w-full" src="{{ $item->imagePath() }}" alt="Item">
                        </div>
                        <div class="w-2/3 p-2">
                            <div class="font-semibold">
                                {{ $item->name }}
                            </div>
                            <div class="text-gray-300 truncate">
                                {{ $item->description }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
