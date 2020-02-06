<template>
    <div>
        <table class="table-auto w-full mt-6">
            <thead>
                <tr>
                    <th class="w-1/5">
                        <div class="flex">
                            <zondicon icon="box" class="fill-current w-6 mr-2" />Location
                        </div>
                    </th>
                    <th class="w-1/5">
                        <div class="flex">
                            <zondicon icon="view-column" class="fill-current w-6 mr-2" />Column
                        </div>
                    </th>
                    <th class="w-1/5">
                        <div class="flex">
                            <zondicon icon="border-all" class="fill-current w-6 mr-2" />Row
                        </div>
                    </th>
                    <th class="w-1/5">
                        <div class="flex">
                            <zondicon icon="shopping-cart" class="fill-current w-6 mr-2" />Stock
                        </div>
                    </th>
                    <th class="w-1/5 h-full text-red-700">-</th>
                </tr>
            </thead>
            <tbody v-if="locations.length > 0">
                <stock-location
                    v-for="(storage, index) in locations"
                    :key="index"
                    :storage="storage"
                    @update="update(storage.stock, storage.id)"
                    @remove="remove(storage.id, index)"
                ></stock-location>
            </tbody>
            <tbody v-else>
                <tr>
                    <td class="flex items-center justify-center p-0">
                        <button
                            class="btn text-white bg-teal-500 hover:bg-green-400 inline-flex px-4 py-3"
                            @click="showAddStockForm = true"
                            v-if="showAddStockForm"
                        >
                            <zondicon icon="add-solid" class="fill-current text-white w-6 mr-2" />ADD STOCK
                        </button>
                        <add-stock @submit="onSubmit" v-else></add-stock>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="border" v-if="locations.length > 0">
            <add-stock @submit="onSubmit"></add-stock>
        </div>
    </div>
</template>
<script>
import AddStock from "./AddStock.vue";
import StockLocation from "./StockLocation.vue";

export default {
    components: { AddStock, StockLocation },
    data() {
        return {
            locations: [],
            showAddStockForm: false,
            editingStock: false
        };
    },
    mounted() {
        this.locations = JSON.parse(this.$attrs.locations);
    },
    methods: {
        onSubmit(location) {
            this.locations.push(location);
        },
        update(stock, id) {
            axios.put('/api/storage-locations/' + id, {
                stock: stock
            })
        },
        remove(id, index) {
            if(confirm('Are you sure you want to delete this stock position?')) {
                this.locations.splice(index, 1)

                axios.delete('/api/storage-locations/' + id)
            }
        }
    }
};
</script>