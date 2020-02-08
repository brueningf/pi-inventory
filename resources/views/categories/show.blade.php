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
    @else
    @if(count($category->items))
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="w-1/6">Provider Code</th>
                <th class="w-2/6">Name</th>
                <th class="w-1/6">Price</th>
                <th class="w-1/6">Provider</th>
                <th class="w-1/6">Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category->items as $item)
            <tr class="hover:bg-blue-100">
                <td>
                    <a href="{{ $item->path() }}">
                        {{ $item->provider_code }}
                    </a>
                </td>
                <td>
                    <a href="{{ $item->path() }}">
                        {{ $item->name }}
                    </a>
                </td>
                <td>
                    {{ $item->price }} $
                </td>
                <td>
                    <a href="{{ $item->provider->path() }}">
                        {{ $item->provider->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ $item->category->path() }}">
                        {{ $item->category->name }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center text-xl font-bold py-12 uppercase">
        No items in this category yet...
    </div>
    @endif
    @endif

</div>
@endsection