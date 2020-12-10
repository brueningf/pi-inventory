@extends('layout.app')

@section('content')

<h3 class="text-xl font-bold text-center my-6">
    Update project
</h3>

<form action="{{ $project->path() }}" method="POST" class="w-4/5 mt-6 mx-auto">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="mb-6">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $project->name) }}" required>
    </div>

    <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit">Update</button>
</form>

@endsection
