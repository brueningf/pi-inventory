@extends('layout.app')

@section('content')

    <h3 class="text-xl font-bold text-center my-6">
        Update category
    </h3>

    <form action="{{ $category->path() }}" method="POST" class="w-4/5 mt-6 mx-auto">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="mb-6">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        </div>
        <div class="mb-6">
            <label for="description">Description</label>
            <textarea name="description" rows="5"
                      placeholder="e.g. Contains example items">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="parent_id">Parent Category (only if subcategory)</label>
            <select name="parent_id" class="bg-white shadow px-3 py-2" required>
                <option {{ ! $category->hasParent() ? 'selected' : '' }} value="">Parent category</option>

                @foreach ($availableCategories as $parentCategory)
                    <option
                        value="{{ $parentCategory->id }}" {{ $category->parent_id == $parentCategory->id ? 'selected' : '' }}>
                        {{ $parentCategory->name }}
                    </option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>

        <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit">Update</button>
    </form>

@endsection
