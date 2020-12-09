<template>
    <div class="mb-12 bg-white">
        <table class="table-auto w-full mt-6">
            <thead>
            <tr>
                <th class="w-1/6">
                    <div class="flex">
                        <zondicon icon="location" class="fill-current w-6 mr-2"/>
                        Location
                    </div>
                </th>
                <th class="w-1/6">
                    <div class="flex">
                        <zondicon icon="view-column" class="fill-current w-6 mr-2"/>
                        Column
                    </div>
                </th>
                <th class="w-1/6">
                    <div class="flex">
                        <zondicon icon="border-all" class="fill-current w-6 mr-2"/>
                        Packing Type
                    </div>
                </th>
                <th class="w-1/6">
                    <div class="flex">
                        <zondicon icon="shopping-cart" class="fill-current w-6 mr-2"/>
                        Stock
                    </div>
                </th>
                <th class="w-1/6">
                    <div class="flex">
                        <zondicon icon="flag" class="fill-current w-6 mr-2"/>
                        Status
                    </div>
                </th>
                <th class="w-1/6 h-full"></th>
            </tr>
            </thead>
            <tbody>
            <stock-location
                v-for="(storage, index) in locations"
                :key="index"
                :storage="storage"
                @update="update(storage.stock, storage.id)"
                @remove="remove(storage.id, index)"
            ></stock-location>
            </tbody>
        </table>
        <div class="border">
            <add-stock @submit="onSubmit"></add-stock>
        </div>
    </div>
</template>
<script>
import AddStock from './AddStock.vue'
import StockLocation from './StockLocation.vue'

export default {
    components: { AddStock, StockLocation },
    data() {
        return {
            locations: [],
            showAddStockForm: false,
            editingStock: false
        }
    },
    mounted() {
        if (typeof this.$attrs.locations == 'string') {
            this.locations = JSON.parse(this.$attrs.locations)
        } else {
            this.locations = this.$attrs.locations
        }
    },
    methods: {
        onSubmit(location) {
            this.locations.push(location)
        },
        update(stock, id) {
            axios.put('/api/storage-locations/' + id, {
                stock: stock
            })

            this.$emit('stock-change', stock)
        },
        remove(id, index) {
            if (confirm('Are you sure you want to delete this stock position?')) {
                this.locations.splice(index, 1)

                axios.delete('/api/storage-locations/' + id)
            }
        }
    }
}
</script>
