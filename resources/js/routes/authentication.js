import login from '../pages/login'
import register from '../pages/register'

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
]
