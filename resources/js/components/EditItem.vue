<template>
    <form class="tw-only px-5 py-8 bg-gray-600" :action="'/items/'+item.id" @submit.prevent="submit" v-if="item">
        <div class="mb-6">
            <label>Name</label>
            <input type="text" v-model="item.name" placeholder="e.g. Example item" required>
        </div>
<!--        <div class="w-1/2 mb-6">-->
<!--            <label>Image</label>-->
<!--            <div class="flex items-center justify-start">-->
<!--                <input type="file" >-->
<!--                <img :src="item.image_path" alt="" width="60" height="60">-->
<!--            </div>-->
<!--        </div>-->
        <div class="flex flex-wrap mb-6">
            <!--            <div class="w-1/2 md:w-1/4 md:pr-3 relative">-->
            <!--                <label>Category</label>-->

            <!--                <select v-model="item.category_id" class="bg-white shadow px-3 py-2" required>-->
            <!--                    <option value="" disabled>Select a category</option>-->

            <!--                    <option v-for="category in availableCategories"-->
            <!--                        :value="category.id">-->
            <!--                    </option>-->
            <!--                </select>-->
            <!--                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">-->
            <!--                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">-->
            <!--                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>-->
            <!--                    </svg>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="w-1/2 md:w-1/4 px-3 relative">-->
            <!--                <label>Item Case</label>-->
            <!--                <select name="item_case_id" class="bg-white shadow px-3 py-2" required>-->
            <!--                    <option value="" disabled class="text-gray-700">Select an case</option>-->

            <!--                    <option>-->
            <!--                    </option>-->
            <!--                </select>-->
            <!--                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">-->
            <!--                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">-->
            <!--                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>-->
            <!--                    </svg>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="w-1/2 md:w-1/4 px-3 relative">-->
            <!--                <label for="manufacturer_id">Manufacturer</label>-->
            <!--                <select name="manufacturer_id" class="bg-white shadow px-3 py-2" required>-->
            <!--                    <option value="" disabled class="text-gray-700">Select a manufacturer</option>-->

            <!--                    @foreach ($manufacturers as $manufacturer)-->
            <!--                    <option-->
            <!--                        value="manufacturer->id" item->manufacturer_id  == $manufacturer->id ? 'selected' : ''>-->
            <!--                        manufacturer->name-->
            <!--                    </option>-->
            <!--                    @endforeach-->
            <!--                </select>-->
            <!--                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">-->
            <!--                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">-->
            <!--                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>-->
            <!--                    </svg>-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="w-1/2 pr-3 pb-3">
                <label>Provider code</label>
                <input type="text" placeholder="e.g. STMM001" v-model="item.provider_code">
            </div>

            <div class="w-1/2 pr-3 pb-3">
                <label>Price per unit $</label>
                <input type="number" min="0.00" max="10000.00" step="0.01" placeholder="0.00"
                       v-model="item.price" required>
            </div>
            <div class="w-1/2 pr-3 pb-3">
                <label>Marking Code</label>
                <input type="text" v-model="item.marking_code">
            </div>
            <div class="w-1/2 pr-3 pb-3">
                <label>Reference</label>
                <input type="text" v-model="item.reference">
            </div>
        </div>
        <div class="mb-6">
            <label>Description</label>
            <textarea v-model="item.description" rows="4"
                      placeholder="e.g. Fancy example item">item->description</textarea>
        </div>

        <div class="mb-6">
            <label>Datasheet Path</label>
            <input type="text" placeholder="C:/Datasheets/ExampleItemDatasheet.pdf"
                   v-model="item.datasheet">
        </div>

        <div class="my-6">
            <button class="btn bg-green-500 text-white hover:bg-green-400 mr-5" type="submit">Update item</button>
        </div>
    </form>
</template>
<script>
export default {
    props: ['data', 'availableCategories', 'itemCases', 'manufacturers'],
    mounted() {
        this.item = this.data
    },
    data() {
        return {
            item: null
        }
    },
    methods: {
        async submit() {
            axios.patch('/items/' + this.item.id, {
                name: this.item.name,
                'provider_code': this.item.provider_code,
                'marking_code': this.item.marking_code,
                'price': this.item.price,
                'description': this.item.description,
                'datasheet': this.item.datasheet,
            }).then((response) => {
                toast.fire({ title: 'Item ' + this.item.name + ' was updated.', icon: 'success'})
            }).catch((error) => {
                toast.fire({ title: 'Request failed.', icon: 'error'})
            })

            this.$modal.hide('edit-item-' + this.item.id)
        }
    }
}
</script>
