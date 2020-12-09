<template>
    <form class="w-full bg-gray-100 flex" @submit.prevent="submit">
        <div class="w-1/6 border-b-2 border-l py-2 px-3">
            <input type="text" placeholder="Location" v-model="location" required/>
        </div>
        <div class="w-1/6 border-b-2 border-l py-2 px-3">
            <input type="text" placeholder="Column" v-model="column"/>
        </div>
        <div class="w-1/6 border-b-2 border-l py-2 px-3">
            <input type="text" placeholder="Type" v-model="level"/>
        </div>
        <div class="w-1/6 border-b-2 border-l py-2 px-3">
            <input type="number" step="1" placeholder="Stock" v-model="stock"/>
        </div>
        <div class="w-1/6 border-b-2 border-l py-2 px-3">
            <input type="text" step="1" placeholder="Status" v-model="status"/>
        </div>
        <div class="w-1/6 border-b-2 border-l border-r py-2 px-3 flex items-center justify-center">
            <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit">
                <div class="flex">
                    <zondicon icon="add-solid" class="fill-current w-6 mr-2"/>
                    Add location
                </div>
            </button>
        </div>
    </form>
</template>
<script>
    export default {
        data() {
            return {
                location: '',
                column: '',
                level: '',
                stock: 0,
                status: '-'
            }
        },
        mounted() {
            if (window.currentCategory) this.column = window.currentCategory.name
        },
        methods: {
            submit() {
                this.$emit('submit', {
                    location: this.location,
                    column: this.column,
                    level: this.level,
                    stock: this.stock,
                    status: this.status
                })

                axios.post('/api/storage-locations', {
                    location: this.location,
                    column: this.column,
                    level: this.level,
                    stock: this.stock,
                    status: this.status,
                    item_id: this.$parent.$attrs['item-id']
                })
            }
        }
    }
</script>
