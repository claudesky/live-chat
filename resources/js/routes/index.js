import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Page components
import home from '../pages/home';

import authentication from './authentication';

const routes = [
    {
        path: '/',
        name: 'home',
        component: home,
    },
    ...authentication,
]

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'group-active',
    linkExactActiveClass: 'active',
    routes,
})

export default router
