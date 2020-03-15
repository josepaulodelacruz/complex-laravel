import Routes from '@/constants/routes'
import { Home, Login, View } from '@/pages'

export default [
    {
        path: '/',
        component: Home,
        redirect: {
            name: Routes.home
        },
        meta: {
            auth: true
        }
    },
    {
        path: '/',
        name: Routes.home,
        component: Home,
        meta: {
            auth: true
        }
    },
    {
        path: '/login',
        name: Routes.login,
        component: Login,
        meta: {
            guest: true
        }
    },
    {
        path: '/view/:idName',
        name: Routes.view,
        component: View,
        props: true
    }
]
