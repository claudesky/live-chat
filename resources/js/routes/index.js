import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Page components
import home from '../pages/home';
import login from '../pages/login';
import register from '../pages/register';

const routes = [
    {
        path: '/',
        name: 'home',
        component: home,
    },
    {
        path: '/login',
        name: 'login',
        component: login,
    },
    {
        path: '/register',
        name: 'register',
        component: register,
    },
]

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'group-active',
    linkExactActiveClass: 'active',
    routes,
})

export default router
