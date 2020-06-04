@extends('layout.app')

@section('content')
    <div class="flex p-6 mt-6">
        @foreach($locations as $storage)
            <div class="px-3 py-3 border mb-2 mr-2">
                {{ $storage->location }}
            </div>
        @endforeach
    </div>
@endsection
