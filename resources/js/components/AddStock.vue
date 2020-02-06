<template>
    <form class="w-full bg-green-100 flex" @submit.prevent="submit">
        <div class="w-1/5 border py-2 px-3">
            <input type="text" placeholder="Location" v-model="location" />
        </div>
        <div class="w-1/5 border py-2 px-3">
            <input type="text" placeholder="Column" v-model="column" />
        </div>
        <div class="w-1/5 border py-2 px-3">
            <input type="text" placeholder="Level" v-model="level" />
        </div>
        <div class="w-1/5 border py-2 px-3">
            <input type="number" step="1" placeholder="Stock" v-model="stock" />
        </div>
        <div class="w-1/5 border py-2 px-3 flex items-center justify-center">
            <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit">Add stock</button>
        </div>
    </form>
</template>
<script>
export default {
    data() {
        return {
            location: "",
            column: "",
            level: "",
            stock: 0
        };
    },
    methods: {
        submit() {
            this.$emit('submit', {
                location: this.location,
                column: this.column,
                level: this.level,
                stock: this.stock,
            })

            axios.post("/api/storage-locations", {
                location: this.location,
                column: this.column,
                level: this.level,
                stock: this.stock,
                item_id: this.$parent.$attrs['item-id']
            });
        }
    }
};
</script>