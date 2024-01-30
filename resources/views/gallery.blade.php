@extends('layout.app')

@section('content')
    <div class="flex flex-wrap -mx-4">
        @foreach($items as $item)
            <a class="block w-1/5 h-64 relative group border-r-2 border-t-2 border-inline border-black"
               href="{{ $item->path() }}"
            >
                <img class="w-full h-64 object-cover" src="{{ $item->image }}" alt="">
                <div class="hidden group-hover:block absolute bottom-0 left-0 w-full text-white bg-blue-500 py-2 px-3">
                    {{ $item->name }} <br>
                    {{ $item->description }}
                </div>
            </a>
        @endforeach
    </div>
@endsection
