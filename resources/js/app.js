require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import router from './router'

const App = require('./components/App').default

const app = new Vue({
    components: {App},
    template: "<App/>",
    router
}).$mount('#app')
