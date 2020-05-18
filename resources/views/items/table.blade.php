<table class="table-auto w-full">
    <thead>
    <tr>
        <th class="w-1/12"></th>
        <th class="w-1/6">Name</th>
        <th class="w-1/12">Case</th>
        <th class="w-1/12">Price</th>
        <th class="w-1/12">Total Stock</th>
        <th class="w-1/6">Manufacturer</th>
        <th class="w-1/12">Datasheet</th>
        <th class="w-1/6"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr class="bg-gray-600 hover:bg-blue-900">
            <td>
                <div class="flex justify-center items-center">
                    <img src="{{ $item->imagePath() }}" alt="" width="80" height="80">
                </div>
            </td>
            <td>
                <a href="{{ $item->path() }}">
                    {{ $item->name }}
                </a>
            </td>
            <td>
                <a href="{{ $item->itemCase->path() }}">
                    {{ $item->itemCase->name }}
                </a>
            </td>
            <td>
                {{ $item->price }} $
            </td>
            <td>
                <div class="font-bold">
                    {{ $item->total() }}
                </div>
            </td>
            <td>
                <a href="{{ optional($item->manufacturer)->path() }}">
                    {{ optional($item->manufacturer)->name }}
                </a>
            </td>
            <td>
                @if($item->datasheet)
                    <a href="{{ $item->datasheetPath() }}" class="flex justify-center">
                        <zondicon icon="book-reference" class="w-8 h-8 fill-current"></zondicon>
                    </a>
                @else
                    <div class="text-center">No datasheet</div>
                @endif
            </td>
            <td>
                @include('components.actions', ['model' => $item])
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
