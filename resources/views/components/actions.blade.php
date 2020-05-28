<div class="flex justify-center items-center">
    <a href="{{ route(modelRouteName($model) . '.edit', $model) }}"
        class="flex items-center justify-center text-normal cursor-pointer text-blue-300 rounded hover:text-blue-500 hover:underline p-1 mr-1"
    >
        <zondicon icon="edit-pencil" class="w-6 h-6 fill-current"></zondicon>
    </a>

    <form action="{{ route(modelRouteName($model) . '.destroy', $model) }}"
          method="POST"
          class="delete-form"
    >
        @csrf
        @method('DELETE')
        <button
            class="flex items-center justify-center text-normal cursor-pointer text-red-300 rounded hover:text-red-500 hover:underline p-1">
            <zondicon icon="trash" class="w-6 h-6 fill-current"></zondicon>
        </button>
    </form>
</div>
