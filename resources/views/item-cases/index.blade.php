@extends('layout.app')

@section('content')
    <div class="p-6">
        <div class="flex mb-6">
            <a class="flex px-4 py-3 cursor-pointer border border-green-300 hover:bg-gray-200"
               href="{{ route('item-cases.create') }}">
                <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
                Add item case
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="w-1/6">Image</th>
                <th class="w-3/6">Name</th>
                <th class="w-1/6"></th>
                <th class="w-1/6"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($itemCases as $itemCase)
                <tr class="bg-gray-100 hover:bg-blue-100">
                    <td>

                    </td>
                    <td>
                        <a href="{{ $itemCase->path() }}">
                            {{ $itemCase->name }}
                        </a>
                    </td>
                    <td>
                    </td>
                    <td>
                        <div class="flex justify-center">
                            <a class="mr-3 hover:underline" href="{{ $itemCase->path() . '/edit' }}">Edit</a>

                            <form class="delete-form" action="{{ route('item-cases.destroy', $itemCase) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="cursor-pointer hover:text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
