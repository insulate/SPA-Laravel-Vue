import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Login from "../components/login/Login";
import Signup from "../components/login/Signup";
import Forum from "../components/forum/forum";
import Logout from "../components/login/Logout";
import Read from "../components/forum/read";
import Create from "../components/forum/create";
import CreateCategory from "../components/category/CreateCategory";

const routes = [
    { path: '/login', component: Login }, //กำหนด path ถ้า url เป็น login ให้ใช้ component login
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/category', component: CreateCategory },
    { path: '/forum', component: Forum, name: 'forum'},
    { path: '/ask', component: Create},
    { path: '/question/:slug', component: Read, name: 'read'},
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang : false, //ทำให้ # ใน url หายไป
    mode: 'history' //ทำให้ # ใน url หายไป
});

export default router;
