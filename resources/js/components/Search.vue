<template>
    <div>
        <ais-instant-search
            :search-client="searchClient"
            index-name="posts_index"
        >
        </ais-instant-search>
    </div>
</template>

<script>

export default {
    name: 'Search',
    data() {
        return {

        }
    }
}
</script>

<style scoped>

</style>
