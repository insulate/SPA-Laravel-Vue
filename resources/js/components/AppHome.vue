<template>
    <div>
        <Toolbar></Toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Toolbar from './Toolbar'
    import AppFooter from './AppFooter';
    import Login from "./login/Login";
    export default {
        component: {Toolbar,Login,AppFooter}
    }
</script>

<style scoped>

</style>
