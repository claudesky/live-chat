import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Vuex
import store from '../store';

// Page components
import home from '../pages/home';
import dashboard from '../pages/dashboard';

import authentication from './authentication';

const routes = [
    {
        path: '/',
        name: 'home',
        component: home,
        meta: { guestOnly: true },
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: dashboard,
        meta: { requiresAuth: true },
    },
    ...authentication,
]

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'group-active',
    linkExactActiveClass: 'active',
    routes,
})

// Guest authentication guard
router.beforeEach((to, from, next) => {
    // If user is logged in and trying to get guest page, redirect to home
    if (
        store.getters['self/isLoggedIn'] &&
        to.meta.guestOnly
    ) {
        next({name: 'home'})
    }

    // If user is not logged in and tring to get authenticated page, redirect to login
    if (
        !store.getters['self/isLoggedIn'] &&
        to.meta.requiresAuth
    ) {
        next({name: 'login'})
    }

    next()
})

export default router
