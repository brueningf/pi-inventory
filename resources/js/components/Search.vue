<template>
    <div class="w-full text-black overflow-hidden" style="min-height: 30vh">
       <div class="relative w-full px-5 py-3">
           <zondicon v-show="loading" icon="reload"
                     class="animate-spin fill-current text-red-700 w-6 pointer-events-none absolute top-0 left-0 mt-5 ml-6"></zondicon>
           <input id="search" class="w-64 px-5" type="search" name="q"
                  @input="search"
                  placeholder="Search items" autofocus>
       </div>

        <div class="px-5 my-3">
            <a :href="hit.path" v-for="hit in results" :key="hit.id" class="flex block h-10 hover:bg-gray-200 hover:shadow border-t border-black">
                <img :src="hit.image_path" class="mr-2" alt="">
                <div class="px-3 py-2 w-5/6">
                    <span class="font-bold" v-text="hit.name" ></span>
                    <span v-text="hit.description"></span>
                </div>
            </a>
        </div>

    </div>
</template>

<script>

export default {
    data() {
        return {
            query: '',
            debounce: null,
            loading: false,
            results: []
        }
    },
    methods: {
        search(event) {
            clearTimeout(this.debounce)

            this.debounce = setTimeout(() => {
                this.loading = true
                this.query = event.target.value

                axios.get('/api/search/' + this.query).then(({data}) => this.results = data).finally(() => this.loading = false)
            },500)
        }
    }
}
</script>

<style scoped>

</style>
