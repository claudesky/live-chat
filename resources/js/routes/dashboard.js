import dashboard from '../pages/dashboard'
import discover from '../pages/dashboard/discover'
import messages from '../pages/dashboard/messages'
import request from '../pages/dashboard/request'
import newRequest from '../pages/dashboard/new-request'

export default [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: dashboard,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'discover',
                alias: '/discover',
                component: discover,
                meta: { requiresAuth: true },
            },
            {
                path: '/messages/:room_id',
                name: 'messages',
                component: messages,
                meta: { requiresAuth: true },
            },
            {
                path: '/requests/new/:respondent_id',
                name: 'new-request',
                component: newRequest,
                meta: { requiresAuth: true },
            },
            {
                path: '/requests/:message_request_id',
                name: 'request',
                component: request,
                meta: { requiresAuth: true },
            },
        ]
    },
]
