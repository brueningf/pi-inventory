<template>
    <form @submit.prevent="submit" class="flex">
        <div class="w-1/3 pr-3">
            <label>Name</label>
            <input type="text" v-model="name">
        </div>
        <div class="w-1/3">
            <label>Value</label>
            <input type="text" v-model="value">
        </div>

        <div class="w-1/3 pl-3 flex items-end">
            <button class="btn bg-green-500 text-white hover:bg-green-400" type="submit" v-text="loading ? 'Saving...' : 'Add attribute'"></button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            value: '',
            loading: false
        }
    },
    methods: {
        submit() {
            this.loading = true
            axios.post('/api/add-attribute/' + this.$parent.item.id, {
                name: this.name,
                value: this.value
            }).then(response => {
                this.loading = false
                this.$emit('attribute-added', response.data)
            })

            window.toast.fire({ title: 'Attribute added', icon: 'success' })
        }
    }
}
</script>

<style scoped>

</style>
