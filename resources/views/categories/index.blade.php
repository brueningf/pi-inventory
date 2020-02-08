@extends('layout.app')

@section('content')
<div class="p-6">
    <div class="flex mb-6">
        <a class="flex px-4 py-3 cursor-pointer bg-gray-300 hover:bg-gray-200" href="/categories/create">
            <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
            New Category
        </a>
    </div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="w-1/6">Name</th>
                <th class="w-3/6">Description</th>
                <th class="w-1/6">Parent Category</th>
                <th class="w-1/6"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($availableCategories as $category)
            <tr class="bg-white hover:bg-blue-100">
                <td>
                    <a href="{{ $category->path() }}">
                        {{ $category->name }}
                    </a>
                </td>
                <td>
                    {{ $category->description }}
                </td>
                <td>

                </td>
                <td>
                    ACTIONS HERE
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection