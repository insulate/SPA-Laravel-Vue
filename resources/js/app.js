
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
Vue.use(Vuetify);

import User from './Helpers/User.js';
window.User = User;
console.log(User.id());

Vue.component('AppHome', require('./components/AppHome.vue').default);
Vue.component('Toolbar', require('./components/Toolbar.vue').default);
Vue.component('AppFooter', require('./components/AppFooter.vue').default);
Vue.component('Login', require('./components/login/Login.vue').default);

import router from './Router/router.js';

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
});
