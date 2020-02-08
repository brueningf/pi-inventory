<template>
    <div class="cursor-pointer bg-gray-300" v-if="category.subcategories.length">
        <div class="pl-4 py-4 hover:bg-red-600 flex font-semibold" @click="showSubcategories = !showSubcategories">
            <a :href="category.path" class="hover:text-white">{{ category.name }}</a>
            <zondicon v-if="category.subcategories.length" icon="arrow-thick-down" class="w-3 ml-3"/>
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
        <a :href="category.path" class="cursor-pointer bg-gray-300 pl-4 py-4 hover:bg-red-600 flex font-semibold hover:text-white">{{ category.name }}</a>
            <zondicon v-if="category.subcategories.length" icon="arrow-thick-down" class="w-3 ml-3"/>
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