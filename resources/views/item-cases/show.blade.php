@extends('layout.app')

@section('content')
    <div class="p-6">
        <h3 class="text-center text-2xl font-bold mb-6">
            {{ $itemCase->name }}
        </h3>

        @if(count($itemCase->items))
            @include('items.table', ['items' => $itemCase->items])
        @else
            <div class="text-center text-lg font-bold py-12 uppercase">
                No items with this item case yet...
            </div>
        @endif

    </div>
@endsection
