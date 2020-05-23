<div class="w-full overflow-x-scroll">
    <table class="table-fixed w-full" id="items-table">
        <thead>
        <tr>
            <th class="w-1/12"></th>
            <th class="w-1/12">Name</th>
            <th class="w-1/6">Description</th>
            <th class="w-1/12">Status</th>
            <th class="w-1/12">Stock</th>
            <th class="w-1/12">Price</th>
            <th class="w-1/12">Marking</th>
            <th class="w-1/12">Case</th>
            <th class="w-1/12">Attributes</th>
            <th class="w-1/12">Datasheet</th>
            <th class="w-1/12"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
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
                    {{ $item->description }}
                </td>
                <td class="text-center">
                    {{ $item->status() }}
                </td>
                <td class="text-center">
                    <div class="font-bold">
                        {{ $item->total() }}
                    </div>
                </td>
                <td class="text-center">
                    {{ $item->price }}
                </td>
                <td>
                    {{ $item->marking_code }}
                </td>
                <td>
                    <a href="{{ $item->itemCase->path() }}">
                        {{ $item->itemCase->name }}
                    </a>
                </td>
                <td>
                    @foreach($item->attributes as $attribute)
                        <div>
                            {{ $attribute->value }}
                        </div>
                    @endforeach
                </td>
                <td>
                    @if($item->datasheet)
                        <a href="{{ $item->datasheetPath() }}" target="_blank" class="flex justify-center">
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
</div>
