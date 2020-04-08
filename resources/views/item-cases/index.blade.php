@extends('layout.app')

@section('content')
<div class="p-6">
    <div class="flex mb-6">
        <a class="flex px-4 py-3 cursor-pointer border border-green-300 hover:bg-gray-200" href="{{ route('item-cases.create') }}">
            <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
            Add item case
        </a>
    </div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="w-1/6">Name</th>
                <th class="w-3/6"></th>
                <th class="w-1/6"></th>
                <th class="w-1/6"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemCases as $itemCase)
            <tr class="bg-white hover:bg-blue-100">
                <td>
                    <a href="{{ $itemCase->path() }}">
                        {{ $itemCase->name }}
                    </a>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <a href="{{ $itemCase->path() . '/edit' }}">Edit</a>

                    <form action="{{ route('item-cases.destroy', $itemCase) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="cursor-pointer">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
