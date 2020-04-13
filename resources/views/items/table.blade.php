<table class="table-auto w-full">
    <thead>
    <tr>
        <th class="w-1/6">Provider Code</th>
        <th class="w-2/6">Name</th>
        <th class="w-1/6">Price</th>
        <th class="w-1/6">Manufacturer</th>
        <th class="w-1/6">Category</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr class="hover:bg-blue-100">
            <td>
                <a href="{{ $item->path() }}">
                    {{ $item->provider_code }}
                </a>
            </td>
            <td>
                <a href="{{ $item->path() }}">
                    {{ $item->name }}
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
        </tr>
    @endforeach
    </tbody>
</table>
