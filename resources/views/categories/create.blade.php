@extends('layout.app')

@section('content')

<h3 class="text-xl font-bold text-center my-6">
    Create a new category
</h3>

<form action="/categories" method="POST" class="w-4/5 mt-6 mx-auto">
    {{ csrf_field() }}
    {{ method_field('POST') }}

    <div class="mb-6">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="e.g Example category" required>
    </div>
    <div class="mb-6">
        <label for="description">Description</label>
        <textarea name="description" rows="5" placeholder="e.g Contains example items"></textarea>
    </div>

    <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit">Submit</button>
</form>

@endsection