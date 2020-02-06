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
                            <zondicon icon="border-all" class="fill-current w-6 mr-2" />Level
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
                <tr v-for="(storage, index) in locations" :key="index">
                    <td class="w-1/5">{{ storage.location }}</td>
                    <td class="w-1/5">{{ storage.column }}</td>
                    <td class="w-1/5">{{ storage.level }}</td>
                    <td class="w-1/5">{{ storage.stock }}</td>
                    <td class="w-1/5">ACTIONS HERE</td>
                </tr>
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
                        <add-stock v-else></add-stock>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="border" v-if="locations.length > 0">
            <add-stock></add-stock>
        </div>
    </div>
</template>
<script>
import AddStock from "./AddStock.vue";

export default {
    components: { AddStock },
    data() {
        return {
            locations: [],
            showAddStockForm: false
        };
    },
    mounted() {
        this.locations = JSON.parse(this.$attrs.locations);
    }
};
</script>