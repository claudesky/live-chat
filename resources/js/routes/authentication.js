import login from '../pages/login'
import register from '../pages/register'

// Vuex
import store from '../store';

export default [
    {
        path: '/login',
        name: 'login',
        component: login,
        meta: { guestOnly: true }
    },
    {
        path: '/register',
        name: 'register',
        component: register,
        meta: { guestOnly: true }
    },
    {
        path: '/logout',
        name: 'logout',
        meta: { requiresAuth: true },
        // When user goes to this link, log the user out.
        beforeEnter: (to, from, next) => {
            store.dispatch('self/logout')
                .then(() => {
                    next({ name: 'home' })
                })
        }
    },
]
