<template>
    <div class="cursor-pointer bg-gray-600" v-if="category.subcategories.length">
        <div class="px-6 py-6 hover:bg-red-800 flex justify-between font-semibold text-gray-300 hover:text-white"
             :class="{ 'bg-red-800 text-gray-300': showSubcategories }" @click="showSubcategories = !showSubcategories">
            <a :href="category.path" class="text-gray-300 hover:text-white hover:underline">{{ category.name }}</a>
            <zondicon v-if="category.subcategories.length" icon="arrow-thick-down" class="fill-current w-4"/>
        </div>
        <div class="pl-6 bg-red-800" v-show="showSubcategories">
            <sidemenu-item
                v-for="(subcategory, i) in category.subcategories"
                :key="subcategory.id + '-' + i"
                :category="subcategory"
            ></sidemenu-item>
        </div>
    </div>
    <div class="bg-gray-600" v-else>
        <a :href="category.path"
           class="cursor-pointer bg-gray-600 px-6 py-6 hover:bg-red-800 flex justify-between font-semibold text-gray-300 hover:text-white  hover:underline">{{
            category.name }}</a>
        <zondicon v-if="category.subcategories.length" icon="arrow-thick-down" class="w-4"/>
    </div>
</template>
<script>
    import SidemenuItem from './SidemenuItem.vue'

    export default {
        name: 'sidemenu-item',
        props: ['category'],
        components: { SidemenuItem },
        data() {
            return {
                showSubcategories: false
            }
        },
        watch: {
            showSubcategories(isTrue) {
                if (isTrue) {
                    this.$emit('show', this.$vnode.key)
                }
            }
        },
        mounted() {
            this.$parent.$on('closeIfNot', (id) => this.showSubcategories = this.$vnode.key === id)
        }
    }
</script>
