<template>
    <tr>
        <td class="w-1/5">{{ storage.location }}</td>
        <td class="w-1/5">{{ storage.column }}</td>
        <td class="w-1/5">{{ storage.level }}</td>
        <td class="w-1/5" v-if="editingStock">
            <form class="flex" @submit.prevent="update">
                <input
                    class="border-r-0"
                    type="number"
                    step="1"
                    placeholder="Stock"
                    v-model="storage.stock"
                />
                <button class="btn rounded-none bg-green-500 text-white" type="submit">Save</button>
            </form>
        </td>
        <td class="w-1/5" v-else>{{ storage.stock }}</td>
        <td class="w-1/5">
            <div class="flex items-center justify-center">
                <button
                    class="btn bg-blue-700 text-white mr-2"
                    @click.prevent="editingStock = !editingStock"
                    title="Edit stock"
                >
                    <zondicon icon="edit-pencil" class="fill-current w-4" />
                </button>
                <button
                    class="btn bg-red-700 text-white"
                    @click.prevent="remove"
                    title="Remove position"
                >
                    <zondicon icon="trash" class="fill-current w-4" />
                </button>
            </div>
        </td>
    </tr>
</template>
<script>
export default {
    data() {
        return {
            storage: false,
            editingStock: false
        };
    },
    mounted() {
        this.storage = this.$attrs.storage
    },
    methods: {
        update() {
            this.editingStock = false
            this.$emit('update')
        },
        remove() {
            this.$emit('remove')
        }
    }
};
</script>