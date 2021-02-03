@extends('layout.app')

@section('content')
    <div class="flex flex-wrap -mx-4">
        @foreach($items as $item)
            <div class="w-1/5 h-64 relative group">
                <img class="w-full h-64 object-cover" src="{{ $item->image }}" alt="">
                <div class="absolute bottom-0 left-0 w-full bg-blue-500 group-hover:bg-blue-100">
                    <a href="{{ $item->path() }}">
                        {{ $item->name }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
