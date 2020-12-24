@extends('layout.app')

@section('content')
    <x-previous/>

    <h3 class="text-xl font-bold text-center my-6">
        Edit {{ $item->name }}
    </h3>

    <div class="w-full flex items-center justify-center">
        <a class="bg-gray-300 mr-3 text-black px-3 py-2" href="#edit-item">Edit item</a>
        <a class="bg-gray-300 mr-3 text-black px-3 py-2" href="#item-image">Show image</a>
    </div>

    <modal name="item-image">
        <div>
            <img src="{{ $item->imagePath() }}" alt="" width="400" height="auto"
                 class="block mx-auto my-0">
        </div>
    </modal>
    <modal name="edit-item">
        <edit-item
            :data="{{ $item->toJson() }}"
            :manufacturers="{{ $manufacturers->toJson() }}"
            :item-cases="{{ $itemCases->toJson() }}"
            :available-categories="{{ $availableCategories->toJson() }}"
            :projects="{{ $projects->toJson() }}"
        ></edit-item>
    </modal>

    <ul>
        @foreach($item->toArray() as $key => $value)
            @if(is_array($value))
                <div class="border border-blue-300 bg-gray-700 mt-4 mb-2 px-3">
                    <h3 class="border-b-2 border-blue-400">{{ $key }}</h3>
                    <ul>
                        @forelse($value as $index => $subValue)
                            @if(is_array($subValue))
                                @foreach($subValue as $i => $v)

                                    @if(!is_array($subValue))
                                        <li class="mb-2 border-b border-black">{{ $i }}: {{ $v }}</li>
                                    @endif
                                @endforeach
                            @else
                                <li class="mb-2 border-b border-black">{{ $index }}: {{ $subValue }}</li>
                            @endif

                        @empty
                            <li>
                                No {{ $key }} have been found
                            </li>
                        @endforelse
                    </ul>
                </div>
            @else
                <li class="px-3 py-1 bg-gray-700 border border-green-100 my-2">
                    {{ $key }}: {{ $value }}
                </li>
            @endif
        @endforeach
    </ul>

    {{--    <form action="{{ route('items.update', $item) }}" method="POST" class="w-4/5 mt-6 mx-auto"--}}
    {{--          enctype="multipart/form-data">--}}
    {{--        @csrf--}}
    {{--        @method('PATCH')--}}

    {{--        <div class="mb-6">--}}
    {{--            <label for="name">Name</label>--}}
    {{--            <input type="text" name="name" placeholder="e.g. Example item" required value="{{ $item->name }}">--}}
    {{--        </div>--}}
    {{--        <div class="w-1/2 mb-6">--}}
    {{--            <label for="image">Image</label>--}}
    {{--            <div class="flex items-center justify-start">--}}
    {{--                <input type="file" name="image">--}}
    {{--                <img src="{{ $item->imagePath() }}" alt="" width="60" height="60">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="flex items-start flex-col md:flex-row md:flex-wrap mb-6">--}}
    {{--            <div class="w-1/2 md:w-1/4 md:pr-3 relative">--}}
    {{--                <label for="category_id">Category</label>--}}

    {{--                <select name="category_id" class="bg-white shadow px-3 py-2" required>--}}
    {{--                    <option value="" disabled>Select a category</option>--}}

    {{--                    @foreach ($availableCategories as $category)--}}
    {{--                        <option--}}
    {{--                            value="{{ $category->id }}" {{ $item->category_id  == $category->id ? 'selected' : '' }}>--}}
    {{--                            {{ $category->name }}--}}
    {{--                        </option>--}}
    {{--                    @endforeach--}}
    {{--                </select>--}}
    {{--                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">--}}
    {{--                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
    {{--                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
    {{--                    </svg>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="w-1/2 md:w-1/4 px-3 relative">--}}
    {{--                <label for="manufacturer_id">Item Case</label>--}}
    {{--                <select name="item_case_id" class="bg-white shadow px-3 py-2" required>--}}
    {{--                    <option value="" disabled class="text-gray-700">Select an case</option>--}}

    {{--                    @foreach ($itemCases as $itemCase)--}}
    {{--                        <option--}}
    {{--                            value="{{ $itemCase->id }}" {{ $item->item_case_id  == $itemCase->id ? 'selected' : '' }}>--}}
    {{--                            {{ $itemCase->name }}--}}
    {{--                        </option>--}}
    {{--                    @endforeach--}}
    {{--                </select>--}}
    {{--                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">--}}
    {{--                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
    {{--                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
    {{--                    </svg>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="w-1/2 md:w-1/4 px-3 relative">--}}
    {{--                <label for="manufacturer_id">Manufacturer</label>--}}
    {{--                <select name="manufacturer_id" class="bg-white shadow px-3 py-2" required>--}}
    {{--                    <option value="" disabled class="text-gray-700">Select a manufacturer</option>--}}

    {{--                    @foreach ($manufacturers as $manufacturer)--}}
    {{--                        <option--}}
    {{--                            value="{{ $manufacturer->id }}" {{ $item->manufacturer_id  == $manufacturer->id ? 'selected' : '' }}>--}}
    {{--                            {{ $manufacturer->name }}--}}
    {{--                        </option>--}}
    {{--                    @endforeach--}}
    {{--                </select>--}}
    {{--                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">--}}
    {{--                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
    {{--                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
    {{--                    </svg>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="w-1/2 md:w-1/4 px-3">--}}
    {{--                <label for="provider_code">Provider code</label>--}}
    {{--                <input type="text" name="provider_code" placeholder="e.g. STMM001" value="{{ $item->provider_code }}">--}}
    {{--            </div>--}}

    {{--            <div class="w-1/2 md:w-1/4 md:px-0 md:mt-6 px-3">--}}
    {{--                <label for="price">Price per unit $</label>--}}
    {{--                <input type="number" min="0.00" max="10000.00" step="0.01" name="price" placeholder="0.00"--}}
    {{--                       value="{{ $item->price }}" required>--}}
    {{--            </div>--}}
    {{--            <div class="w-1/2 md:w-1/4 md:mt-6 px-3">--}}
    {{--                <label for="marking_code">Marking Code</label>--}}
    {{--                <input type="text" name="marking_code" value="{{ $item->marking_code }}">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="mb-6">--}}
    {{--            <label for="description">Description</label>--}}
    {{--            <textarea name="description" rows="4"--}}
    {{--                      placeholder="e.g. Fancy example item">{{ $item->description }}</textarea>--}}
    {{--        </div>--}}

    {{--        <div class="mb-6">--}}
    {{--            <label for="datasheet">Datasheet Path</label>--}}
    {{--            <input type="text" name="datasheet" placeholder="C:/Datasheets/ExampleItemDatasheet.pdf"--}}
    {{--                   value="{{ $item->datasheet }}">--}}
    {{--        </div>--}}
    {{--        <hr class="my-3">--}}
    {{--        @forelse($item->attributes as $key => $attribute)--}}
    {{--            (NO FUNCIONA TODAVIA ____EXPERIMENTAL____)--}}
    {{--            <h2 class="underline text-lg mb-3">Attributes</h2>--}}
    {{--            <div class="flex mb-6">--}}
    {{--                <div class="mr-3">--}}
    {{--                    <label for="">Name *</label>--}}
    {{--                    <input type="text" value="{{ $attribute->name }}">--}}
    {{--                </div>--}}
    {{--                <div>--}}
    {{--                    <label for="">Value *</label>--}}
    {{--                    <input type="text"  value="{{ $attribute->value }}">--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @empty--}}
    {{--            No attributes--}}
    {{--        @endforelse--}}

    {{--        <div class="my-6">--}}
    {{--            <button class="btn bg-green-500 text-white hover:bg-green-400 mr-5" type="submit">Update item</button>--}}
    {{--        </div>--}}
    {{--    </form>--}}

@endsection

@section('footer')

    <script>
        window.addEventListener('load', () => document.querySelector('[href="#edit-item"]').click())
    </script>
@endsection
