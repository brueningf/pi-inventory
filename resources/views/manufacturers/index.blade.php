@extends('layout.app')

@section('content')
    <div class="p-6">
        <div class="flex mb-6">
            <a class="flex px-4 py-3 cursor-pointer border border-green-300 hover:bg-gray-200"
               href="{{ route('manufacturers.create') }}">
                <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
                Add Manufacturer
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="w-1/6">Name</th>
                <th class="w-3/6">Description</th>
                <th class="w-1/6">Website</th>
                <th class="w-1/6"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($manufacturers as $manufacturer)
                <tr class="bg-gray-100 hover:bg-blue-100">
                    <td>
                        <a href="{{ $manufacturer->path() }}">
                            {{ $manufacturer->name }}
                        </a>
                    </td>
                    <td>
                        {{ $manufacturer->description }}
                    </td>
                    <td>
                        <a href="{{ $manufacturer->website }}">
                            {{ $manufacturer->website }}
                        </a>
                    </td>
                    <td>
                        <div class="flex justify-center">
                            <a class="mr-3 hover:underline" href="{{ route('manufacturers.edit', $manufacturer) }}">Edit</a>

                            <form action="{{ route('manufacturers.destroy', $manufacturer) }}" method="POST">
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
