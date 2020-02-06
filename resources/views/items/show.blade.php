@extends('layout.app')

@section('content')
<div class="w-full">
    <div class="flex items-center justify-center text-xl font-bold py-6 text-uppercase border -mx-5">
        {{ $item->name }}
    </div>
    <div class="flex mt-6">
        <div class="w-1/4">
            <div class="pr-4">
                <img src="/images/keinBild.gif" alt="Item Picture" class="w-full h-auto border">
            </div>
        </div>
        <div class="w-3/4">
            <div class="flex mb-6">
                <div class="w-1/3">
                    <div class="mb-3"> 
                        <h3>Price per unit</h3>
                        {{ $item->price }} $
                    </div>
                    <div class="mb-3">
                        <h3>Category</h3>
                        <a href="{{ $item->category->path() }}">
                            {{ $item->category->name }}
                        </a>
                    </div>
                </div>
        
                <div class="w-1/3">
                    <div class="mb-3">
                        <h3>Provider Code</h3>
                        {{ $item->provider_code }}
                    </div>
                    <div class="mb-3">
                        <h3>Provider</h3>
                        <a href="{{ $item->provider->path() }}">
                            {{ $item->provider->name }}
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <h3>Description</h3>
                {{ $item->description }}
            </div>
        </div>
    </div>
<stock locations="{{ $item->storageLocations->toJson()}}" item-id="{{ $item->id }}"></stock>   
</div>
@endsection