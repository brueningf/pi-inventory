@extends('layout.app')

@section('content')

<div class="p-6">
    <h3 class="text-xl font-bold mt-6">Last added items</h3>
    <div class="w-full flex flex-wrap my-6">
        @foreach ($items as $item)
        <div class="w-1/5 pr-3 pb-3">
            <a href="{{ $item->path() }}" class="block relative border rounded-lg overflow-hidden">
                {{-- <img class="object-contain w-full" src="/images/keinBild.gif" alt="Item"> --}}
                <div class="p-2">
                    <div class="font-semibold">
                        {{ $item->name }}
                    </div>
                    <div class="text-blue-700">
                        {{ $item->provider_code }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <h3 class="text-xl font-bold mt-6">Providers</h3>
    <div class="w-full flex flex-wrap mt-6 pb-16 block">
        @foreach ($providers as $provider)
        <div class="w-1/5 mt-3 pr-3">
            <a href="{{ $provider->path() }}" class="w-full block p-2 text-bold text-center border rounded hover:bg-blue-100">
                {{ $provider->name }}
            </a>
        </div>
        @endforeach
    </div>
</div>



@endsection