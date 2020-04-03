import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Login from "../components/login/Login";
const routes = [
    { path: '/login', component: Login }, //กำหนด path ถ้า url เป็น login ให้ใช้ component login
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang : false, //ทำให้ # ใน url หายไป
    mode: 'history' //ทำให้ # ใน url หายไป
});

export default router;
