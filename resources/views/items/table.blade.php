<table class="table-auto w-full">
    <thead>
    <tr>
        <th class="w-1/12"></th>
        <th class="w-1/6">Name</th>
        <th class="w-1/12">Case</th>
        <th class="w-1/12">Price</th>
        <th class="w-1/6">Manufacturer</th>
        <th class="w-1/6">Category</th>
        <th class="w-1/6">Provider Code</th>
        <th class="w-1/12">Datasheet</th>

    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr class="bg-gray-100 hover:bg-blue-100">
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
                <a href="{{ optional($item->manufacturer)->path() }}">
                    {{ optional($item->manufacturer)->name }}
                </a>
            </td>
            <td>
                <a href="{{ $item->category->path() }}">
                    {{ $item->category->name }}
                </a>
            </td>
            <td>
                <a href="{{ $item->path() }}">
                    {{ $item->provider_code }}
                </a>
            </td>
            <td>
                @if($item->datasheet)
                    <a href="{{ $item->datasheetPath() }}" class="flex justify-center">
                        <zondicon icon="book-reference" class="w-8 h-8 fill-current"></zondicon>
                    </a>
                @else
                    No datasheet
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
