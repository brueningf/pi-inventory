@extends('layout.app')

@section('content')
    <div class="p-6">
        <h3 class="text-center text-2xl font-bold mb-6">
            {{ $project->name }}
        </h3>

        @if(count($project->items))
            @include('items.table', ['items' => $project->items])
        @else
            <div class="text-center text-lg font-bold py-12 uppercase">
                No items in this project yet...
            </div>
        @endif

    </div>
@endsection
