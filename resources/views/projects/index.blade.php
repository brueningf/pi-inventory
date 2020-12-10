@extends('layout.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-end mb-6">
            <a class="flex px-4 py-3 cursor-pointer border border-green-300 hover:bg-gray-200"
               href="{{ route('projects.create') }}">
                <zondicon icon="add-solid" class="fill-current w-5 mr-2"></zondicon>
                Add a project
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="w-1/6"></th>
                <th class="w-3/6">Name</th>
                <th class="w-1/6"></th>
                <th class="w-1/6"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr class="bg-gray-100 hover:bg-blue-100">
                    <td>

                    </td>
                    <td>
                        <a href="{{ $project->path() }}">
                            {{ $project->name }}
                        </a>
                    </td>
                    <td>
                    </td>
                    <td>
                        @include('components.actions', ['model' => $project])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
