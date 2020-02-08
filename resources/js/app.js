require('./bootstrap');

import Vue from 'vue/dist/vue.js';
import Zondicon from 'vue-zondicons';
import Stock from './components/Stock.vue';
import Sidemenu from './components/Sidemenu.vue';

Vue.component('zondicon', Zondicon);
Vue.component('stock', Stock);
Vue.component('sidemenu', Sidemenu);


let app = new Vue({
    el: '#app'
});