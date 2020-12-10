<template>
    <div v-show="shouldDisplay">
        <slot></slot>
    </div>
</template>
<script>
    import inViewport from 'in-viewport'

    export default {
    props: ['whenHidden'],
    data() {
        return {
            shouldDisplay: false
        }
    },
    mounted() {
        document.addEventListener('scroll', () => {
            this.shouldDisplay = ! inViewport(document.querySelector(this.whenHidden))
        }, { passive: true })
    }
}
</script>
