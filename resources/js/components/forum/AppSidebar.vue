<template>
    <v-card class="mt-2">
        <v-list dense>
            <v-subheader>Categories</v-subheader>
            <v-list-item-group v-model="categories" color="primary">
                <v-list-item v-for="category in categories" :key="category.name">
                    <v-list-item-content>
                        <v-list-item-title v-text="category.name"></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list-item-group>
        </v-list>
    </v-card>
</template>

<script>
    export default {
        data: () => ({
            cate: 1,
            categories: null,
        }),
        created() {
            axios.get('/api/category')
            .then(res => this.categories = res.data.data)
        }
    }
</script>

<style scoped>

</style>
