<template>
    <v-container>
        <form @submit.prevent="create()">
            <v-text-field
                label="Title"
                v-model="form.title"
                type="text"
            ></v-text-field>

            <v-select
                :items="categories"
                item-text="name"
                item-value="id"
                v-model="form.category_id"
                label="Category"
                autocomplete
            ></v-select>

            <vue-simplemde v-model="form.body" ref="markdownEditor" />

            <v-btn color="green" type="submit">Create</v-btn>
        </form>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    title: null,
                    category_id: null,
                    body: null
                },
                categories:null,
                errors: null
            }
        },
        created(){
            axios.get('/api/category')
            .then(res => this.categories = res.data.data);
        },
        methods: {
            create() {
                axios.post('/api/question', this.form)
                .then(res => this.$router.push(res.data.path))
                .catch(error => console.log(error.response.data.error));
            }
        }
    }
</script>

<style scoped>

</style>
