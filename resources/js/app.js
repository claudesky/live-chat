require('./bootstrap')

import Vue from 'vue'

// Vue Router
import router from './routes'

// Main layout
import App from './main.vue'

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
