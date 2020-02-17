<template>
    <div class="cursor-pointer bg-gray-200" v-if="category.subcategories.length">
        <div class="px-6 py-6 hover:bg-red-600 flex justify-between font-semibold hover:text-white" :class="{ 'bg-red-600 text-white': showSubcategories }" @click="showSubcategories = !showSubcategories">
            <a :href="category.path" class="hover:text-white">{{ category.name }}</a>
            <zondicon v-if="category.subcategories.length" icon="arrow-thick-down" class="fill-current w-4"/>
        </div>
        <div class="pl-6 bg-red-600" v-show="showSubcategories">
            <sidemenu-item
                v-for="(subcategory, i) in category.subcategories"
                :key="subcategory.id + '-' + i"
                :category="subcategory"
            ></sidemenu-item>
        </div>
    </div>
    <div v-else>
        <a :href="category.path" class="cursor-pointer bg-gray-200 px-6 py-6 hover:bg-red-600 flex justify-between font-semibold hover:text-white">{{ category.name }}</a>
            <zondicon v-if="category.subcategories.length" icon="arrow-thick-down" class="w-4"/>
    </div>
</template>
<script>
import SidemenuItem from "./SidemenuItem.vue";

export default {
    name: "sidemenu-item",
    props: ["category"],
    components: { SidemenuItem },
    data() {
        return {
            showSubcategories: false
        };
    }
};
</script>