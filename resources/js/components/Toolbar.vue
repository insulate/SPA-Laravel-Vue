<template>
    <v-card
        color="grey lighten-4"
        flat
        height="200px"
        tile
    >
        <v-toolbar dense>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>Title</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn>Forum</v-btn>
                <v-btn>Ask Question</v-btn>
                <v-btn>Category</v-btn>
                <v-btn>Login</v-btn>
            </v-toolbar-items>
        </v-toolbar>
    </v-card>
</template>

<script>
    export default {

    }
</script>

<style scoped>

</style>
