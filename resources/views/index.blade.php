@extends('layout.app')

@section('content')

<h3 class="text-xl font-bold mt-6">Last added items</h3>
<div class="w-full flex flex-wrap my-6">
    @foreach ($items as $item)
        <a href="{{ $item->path() }}" 
            class="relative shadow rounded-lg overflow-hidden mr-5"
        >
            <img class="object-contain" src="/images/keinBild.gif" alt="Item">
            <div class="p-2">
                <div class="font-semibold">
                    {{ $item->name }}
                </div>
                <div class="text-blue-700">
                    {{ $item->provider_code }}
                </div>
            </div>
        </a>
    @endforeach
</div>

<h3 class="text-xl font-bold mt-6">Categories</h3>
<div class="w-full flex flex-wrap my-6">
    @foreach ($categories as $category)
        <div class="w-1/5 py-2 pr-2">
            <a href="{{ $category->path() }}" 
                class="w-full p-3 text-bold text-center shadow rounded hover:bg-blue-100"
            >
                {{ $category->name }}
            </a>
        </div>
    @endforeach
</div>

<h3 class="text-xl font-bold mt-6">Providers</h3>
<div class="w-full flex flex-wrap my-6">
    @foreach ($providers as $provider)
        <div class="w-1/5 py-2 pr-2">
            <a href="/providers/{{ $provider->id }}" 
                class="w-full p-3 text-bold text-center shadow rounded hover:bg-blue-100"
            >
                {{ $provider->name }}
            </a>
        </div>
    @endforeach
</div>



@endsection