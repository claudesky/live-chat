require('./bootstrap')

import Vue from 'vue'

// Vue Router
import router from './routes'

// Vuex
import store from './store'

// Main layout
import App from './main.vue'

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
});
