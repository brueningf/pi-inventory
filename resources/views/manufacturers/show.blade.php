@extends('layout.app')

@section('content')
    <div class="p-6">
        <h3 class="text-center text-2xl font-bold mb-6">
            {{ $manufacturer->name }}
        </h3>

        @if(count($manufacturer->items))
            @include('items.table', ['items' => $manufacturer->items])
        @else
            <div class="text-center text-xl font-bold py-12 uppercase">
                No items in this category yet...
            </div>
        @endif


    </div>
@endsection
