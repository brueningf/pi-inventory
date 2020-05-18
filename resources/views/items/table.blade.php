<div class="w-full overflow-x-scroll">
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Marking</th>
            <th>Case</th>
            <th>Attributes</th>
            <th>Datasheet</th>
            <th></th>

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
                            {{ $attribute->name }} : {{ $attribute->value }}
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
