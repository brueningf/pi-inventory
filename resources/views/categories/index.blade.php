@extends('layout.app')

@section('content')
    <div class="p-6">
        <div class="flex mb-6">
            <a class="flex px-4 py-3 cursor-pointer border border-green-300 hover:bg-gray-200"
               href="{{ route('categories.create') }}">
                <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
                Add Category
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="w-1/6">Name</th>
                <th class="w-3/6">Description</th>
                <th class="w-1/6">Is subcategory</th>
                <th class="w-1/6"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($availableCategories as $category)
                <tr class="bg-gray-100 hover:bg-blue-100">
                    <td>
                        <a href="{{ $category->path() }}">
                            {{ $category->name }}
                        </a>
                    </td>
                    <td>
                        {{ $category->description }}
                    </td>
                    <td>
                        {{ $category->parent_id == null ? 'No' : 'Yes' }}
                    </td>
                    <td>
                        @include('components.actions', ['model' => $category])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
