@extends('layout.app')

@section('content')
    <div class="p-2 sm:p-6 mt-5">
        <div>

        </div>
        <h3 class="text-xl font-bold mt-6">Recently updated items
            <div class="flex items-center justify-between px-4 py-3 text-gray-300 bg-gray-700">
                <span class="hidden sm:block mr-2">Backup</span>
                <zondicon @if(config('backup_health.checked')) icon="checkmark-outline"
                          @else icon="exclamation-outline" @endif
                          class="w-5 h-5 fill-current mr-1 @if(config('backup_health.checked')) text-green-500 @else text-yellow-500 @endif"></zondicon>
            </div>
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
