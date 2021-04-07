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
router.beforeEach(async (to, from, next) => {
    // If it's the first time the application is loading, check for authentication first
    if (store.getters['self/isFirstLoad']) {
        await store.dispatch('self/check')
    }

    // If user is logged in and trying to get guest page, redirect to home
    if (
        store.getters['self/isLoggedIn'] &&
        to.meta.guestOnly
    ) {
        next({name: 'dashboard'})
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
