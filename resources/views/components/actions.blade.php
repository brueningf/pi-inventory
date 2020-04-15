<div class="flex justify-center items-center">
    <a href="{{ route(modelRouteName($model) . '.edit', $model) }}"
        class="flex items-center justify-between text-normal cursor-pointer border-2 border-blue-300 rounded hover:text-blue-500 hover:underline px-5 py-3 mr-3"
    >
        <zondicon icon="edit-pencil" class="w-4 h-4 fill-current mr-2"></zondicon>
        Edit
    </a>

    <form action="{{ route(modelRouteName($model) . '.destroy', $model) }}"
          method="POST"
          class="delete-form"
    >
        @csrf
        @method('DELETE')
        <button
            class="flex items-center justify-between text-normal cursor-pointer border-2 border-red-300 rounded hover:text-red-500 hover:underline px-5 py-3">
            <zondicon icon="trash" class="w-4 h-4 fill-current mr-2"></zondicon>
            Delete
        </button>
    </form>
</div>
