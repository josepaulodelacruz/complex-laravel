import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = require('./routes').default

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
