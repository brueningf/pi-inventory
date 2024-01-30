@extends('layout.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-end mb-6">
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
                <th class="w-2/6">Abbreviation</th>
                <th class="w-2/6">Website</th>
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
                        @include('components.actions', ['model' => $manufacturer])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
