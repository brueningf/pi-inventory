require('./bootstrap')

import Vue from 'vue/dist/vue.js'
import Zondicon from 'vue-zondicons'
import Stock from './components/Stock.vue'
import Sidemenu from './components/Sidemenu.vue'
import SidemenuItem from './components/SidemenuItem.vue'
import ItemsTable from './components/ItemsTable'
import EditItem from './components/EditItem'
import { ConfigProgrammatic, Table } from 'buefy'
import Modal from './plugins/modal/ModalPlugin'
import Visible from './components/Visible'
// import Search from './components/Search'

import InstantSearch from 'vue-instantsearch';

ConfigProgrammatic.setOptions({
    defaultIconPack: 'fas'
})

Vue.use(Table)
Vue.use(Modal)
Vue.use(InstantSearch);

Vue.component('edit-item', EditItem)
Vue.component('zondicon', Zondicon)
Vue.component('stock', Stock)
Vue.component('sidemenu', Sidemenu)
Vue.component('sidemenu-item', SidemenuItem)
Vue.component('items-table', ItemsTable)
Vue.component('visible', Visible)
// Vue.component('search', Search)


let app = new Vue({
    el: '#app',
    data: {
        toast: window.toast,
        showMenu: true,
        showCategoriesDropdown: false,
        searchClient: algoliasearch(
            '51X1TPTCA7',
            'ee6c824fbff3c1629b18316873d4966b'
        )
    },
    mounted() {
        if (this.isMobile()) this.showMenu = false
    },
    methods: {
        toggleMenu() {
           this.showMenu = !this.showMenu
        },
        isMobile() {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        }
    }
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
