@extends('layout.app')

@section('content')
    <div class="mt-3">
        @if(count($category->subcategories))
            <div class="w-full flex flex-wrap">
                @foreach($category->subcategories as $subcategory)
                    <div class="w-1/6 pr-3 pb-3 flex">
                        <a class="bg-gray-400 p-4 w-full text-black text-center text-xl"
                           href="{{ $subcategory->path }}">
                            {{ $subcategory->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        @if($category->items->count())
            <div class="mt-3">
                @include('items.table', ['items' => $category->items])
            </div>
        @else
            <div class="text-center text-xl font-bold py-12 uppercase mt-12">
                No items in this category :(
            </div>
        @endif

    </div>


@endsection

@section('footer')
    <script>
        window.currentCategory = {!! $category->toJson() !!}
        window.scrollTo(0, 0)
        // document.addEventListener('DOMContentLoaded', () => )
    </script>
@endsection
