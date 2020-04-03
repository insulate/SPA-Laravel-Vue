
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
Vue.use(Vuetify);

import User from './Helpers/User.js';
window.User = User;

window.EventBus = new Vue();

Vue.component('AppHome', require('./components/AppHome.vue').default);
Vue.component('Toolbar', require('./components/Toolbar.vue').default);
Vue.component('AppFooter', require('./components/AppFooter.vue').default);
Vue.component('Login', require('./components/login/Login.vue').default);
Vue.component('Signup', require('./components/login/Signup.vue').default);

import router from './Router/router.js';

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
});
