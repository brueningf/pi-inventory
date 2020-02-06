require('./bootstrap');

import Vue from 'vue/dist/vue.js';
import Zondicon from 'vue-zondicons';
import Stock from './components/Stock.vue';

Vue.component('zondicon', Zondicon);
Vue.component('stock', Stock);


let app = new Vue({
    el: '#app'
});