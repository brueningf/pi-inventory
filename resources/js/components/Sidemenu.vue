<template>
    <div :class="{ 'absolute w-3/4 sm:w-1/5 z-10': isOpen, 'bg-gray-600 shadow': true }">

        <div>
            <div class="flex font-bold text-white items-center px-4 justify-center bg-gray-500 hover:bg-gray-400 h-10 cursor-pointer" :class="{ 'absolute bg-red-700': ! isOpen }"
                 @click="isOpen = !isOpen">
                <span v-text="isOpen ? 'Hide' : 'Show'"></span>&nbsp;categories
                <zondicon :icon="isOpen ? 'cheveron-left': 'cheveron-right'" class="w-8 h-8 fill-current text-white"
                ></zondicon>
            </div>
            <div v-show="isOpen">
                <sidemenu-item v-for="(category, index) in categories" :key="index" :category="category"
                               @show="isShowingMenu"></sidemenu-item>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.categories = this.$attrs.categories
        },
        data() {
            return {
                categories: [],
                isOpen: false
            }
        },
        methods: {
            isShowingMenu(id) {
                this.$emit('closeIfNot', id)
            }
        }
    }
</script>
