
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
Vue.use(Vuetify);

Vue.component('AppHome', require('./components/AppHome.vue').default);
Vue.component('Toolbar', require('./components/Toolbar.vue').default);
Vue.component('AppFooter', require('./components/AppFooter.vue').default);

import router from './Router/router.js';

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
});
