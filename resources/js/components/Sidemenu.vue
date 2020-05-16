<template>
    <div>
        <sidemenu-item v-for="(category, index) in categories" :key="index" :category="category" @show="isShowingMenu"></sidemenu-item>
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
                categories: []
            }
        },
        methods: {
            isShowingMenu(id) {
                this.$emit('closeIfNot', id)
            }
        }
    }
</script>
