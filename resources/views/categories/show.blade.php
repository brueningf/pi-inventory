@extends('layout.app')

@section('content')
    <div class="p-6">
        <h3 class="text-center text-2xl font-bold mb-6">
            {{ $category->name }}
        </h3>
        @if(count($category->subcategories))
            <div class="w-full flex flex-wrap">
                @foreach($category->subcategories as $subcategory)
                    <div class="w-1/4 pr-3 pb-3 flex">
                        <a class="bg-gray-300 p-4 w-full text-center text-xl" href="{{ $subcategory->path }}">
                            {{ $subcategory->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        @if(count($category->items))
            <div class="mt-12">
                @include('items.table', ['items' => $category->items])
            </div>
        @else
            <div class="text-center text-xl font-bold py-12 uppercase mt-12">
                No items in this category :(
            </div>
        @endif

    </div>
@endsection
