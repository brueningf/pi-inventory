require('./bootstrap')

import Vue from 'vue/dist/vue.js'
import Zondicon from 'vue-zondicons'
import Stock from './components/Stock.vue'
import Sidemenu from './components/Sidemenu.vue'
import ItemsTable from './components/ItemsTable'
import { ConfigProgrammatic, Table } from 'buefy'
import 'buefy/dist/buefy.css'

ConfigProgrammatic.setOptions({
    defaultIconPack: 'fas'
})

Vue.use(Table)

Vue.component('zondicon', Zondicon)
Vue.component('stock', Stock)
Vue.component('sidemenu', Sidemenu)
Vue.component('items-table', ItemsTable)


let app = new Vue({
    el: '#app'
})


document.querySelectorAll('form.delete-form').forEach((form) => {
    form.addEventListener('submit', (evt) => {
        evt.preventDefault()

        swal.fire({
            icon: 'warning',
            title: 'Are you sure?',
            text: 'You will not be able to recover this element!',
            cancelButtonText: 'No, cancel it!',
            confirmButtonText: 'Yes, I am sure!',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then(result => {
            if (result.value) {
                form.submit()
            }
        })
    })
})
