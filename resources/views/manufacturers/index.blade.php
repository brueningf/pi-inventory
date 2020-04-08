@extends('layout.app')

@section('content')

    <div class="p-8">
        <div class="mb-6">
            <a href="/manufacturers/create">Create Manufacturer</a>
        </div>

        @forelse($manufacturers as $manufacturer)
            <a href="{{ $manufacturer->path() }}">{{ $manufacturer->name }}</a>
        @empty
            <p class="font-bold">
                Nothing here yet
            </p>
        @endforelse
    </div>
@endsection
