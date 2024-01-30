@extends('layout.app')

@section('content')
    <div class="p-6">
        @if(count($items))
            @include('items.table', ['items' => $items])
        @else
            <div class="text-center text-xl font-semibold py-12 uppercase">
                No items matching <span class="font-bold text-red-700">"{{ $query }}"</span>
            </div>
        @endif
    </div>
@endsection
