@extends('layout.app')

@section('content')

    <h3 class="text-xl font-bold text-center my-6">
        Update manufacturer
    </h3>

    <form action="{{ $manufacturer->path() }}" method="POST" class="w-4/5 mt-6 mx-auto">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="mb-6">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $manufacturer->name) }}" required>
        </div>
        <div class="mb-6">
            <label for="description">Abbreviation</label>
                    <input type="text" name="description" placeholder="e.g EM" value="{{ old('description', $manufacturer->description) }}">

        </div>

        <div class="mb-6">
            <label for="website">Website</label>
            <input type="url" name="website" value="{{ old('website', $manufacturer->website) }}">
        </div>


        <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit">Update</button>
    </form>

@endsection
