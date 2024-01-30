@extends('layout.app')

@section('content')
    <div class="container mx-auto mt-12">
        <h1 class="text-xl">Settings</h1>

        <h3>Item storage settings</h3>
        <div class="border-t border-white mb-5">
            <h4>Packing Type</h4>
            <ul>
                <li>item</li>
                <li>item</li>
                <li>item</li>
                <li>item</li>
            </ul>

            <button class="px-3 py-2 bg-blue-500">Add</button>
        </div>

        <div class="border-t border-white">

            <h4>Status</h4>
            <ul>
                <li>item</li>
                <li>item</li>
                <li>item</li>
                <li>item</li>
            </ul>

            <button class="px-3 py-2 bg-blue-500">Add</button>
        </div>
    </div>
@endsection
