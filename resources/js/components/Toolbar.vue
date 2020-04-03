<template>
    <div>
        <v-app-bar
            color=" accent-4"
            dense
            dark
        >
            <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->

            <v-toolbar-title>Biiwz</v-toolbar-title>

            <v-spacer></v-spacer>

            <div class="hidden-sm-and-down">
                <v-btn>Forum</v-btn>
                <v-btn>Ask Question</v-btn>
                <v-btn>Category</v-btn>
                <router-link to="/login"><v-btn>Login</v-btn></router-link>
            </div>
        </v-app-bar>
    </div>
</template>

<script>
    export default {

    }
</script>

<style scoped>

</style>
