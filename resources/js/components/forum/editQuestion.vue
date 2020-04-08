<template>
    <v-container>
        <form @submit.prevent="update()">
            <v-text-field
                label="Title"
                v-model="form.title"
                type="text"
            ></v-text-field>

            <vue-simplemde v-model="form.body" ref="markdownEditor" />

            <v-btn color="green" type="submit">Save</v-btn>
            <v-btn type="submit" @click="cancel()">Cancel</v-btn>
        </form>
    </v-container>
</template>

<script>
    export default {
        props:['data'],
        data(){
            return {
                form: {
                    title: null,
                    body: null,
                }
            }
        },
        methods:{
            cancel(){
                EventBus.$emit('cancelEditing');
            },
            update(){
                axios.patch('/api/question/' + this.form.slug,this.form)
                .then(res => {
                    EventBus.$emit('cancelEditing');
                });
            }
        },
        mounted(){
            this.form = this.data;
        },

    }
</script>

<style scoped>

</style>
