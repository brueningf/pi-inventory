<template>
    <div :class="{ 'w-1/5': isOpen, 'bg-gray-600 shadow relative': true }">
        <div class="bg-gray-500 hover:bg-gray-400 absolute top-0 w-8 h-8 cursor-pointer" style="right: -2rem" @click="isOpen = !isOpen">
            <zondicon :icon="isOpen ? 'cheveron-left': 'cheveron-right'" class="w-8 h-8 fill-current text-white"
                      ></zondicon>
        </div>
        <div v-show="isOpen">
            <h3 class="py-4 pl-4 border-b-2 border-black font-bold text-2xl mb-0">Categories</h3>
            <div>
                <sidemenu-item v-for="(category, index) in categories" :key="index" :category="category"
                               @show="isShowingMenu"></sidemenu-item>
            </div>
        </div>
    </div>
</template>
<script>
    import SidemenuItem from './SidemenuItem.vue'

    export default {
        components: { SidemenuItem },
        mounted() {
            this.categories = this.$attrs.categories
        },
        data() {
            return {
                categories: [],
                isOpen: true
            }
        },
        methods: {
            isShowingMenu(id) {
                this.$emit('closeIfNot', id)
            }
        }
    }
</script>
