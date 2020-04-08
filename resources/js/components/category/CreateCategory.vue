<template>
    <v-container>
        <v-form @submit.prevent="submit()">
            <v-text-field
                label="Category Name"
                v-model="form.name"
                required
            ></v-text-field>

            <v-btn type="submit" color="pink" v-if="editSlug">Update</v-btn>
            <v-btn type="submit" color="teal" v-else>Create</v-btn>
        </v-form>
        <v-card class="mt-4">
            <v-toolbar
                color="light-blue"
                dark
            >

                <v-toolbar-title>Category</v-toolbar-title>

                <v-spacer></v-spacer>
            </v-toolbar>

            <v-list two-line subheader>
                <v-list-item
                    v-for="(item,index) in categories"
                    :key="item.id"
                >

                    <v-list-item-content>
                        <v-list-item-title v-text="item.name"></v-list-item-title>
                    </v-list-item-content>

                    <v-list-item-action>
                        <v-btn icon>
                            <v-icon color="orange" @click="edit(index)">mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn icon @click="destroy(item.slug,index)">
                            <v-icon color="red">mdi-delete</v-icon>
                        </v-btn>
                    </v-list-item-action>
                </v-list-item>

                <v-divider></v-divider>
            </v-list>
        </v-card>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: null
                },
                categories: null,
                editSlug: null
            }
        },
        methods: {
            submit(){
                this.editSlug ? this.update():this.create();
            },
            create() {
                axios.post('/api/category', this.form)
                    .then(res => {
                        this.categories.unshift(res.data); //unshift เหมือน push แต่จะใส่ไว้ข้างบน
                        this.form.name = null;
                    });
            },
            update(){
                axios.patch('/api/category/' + this.editSlug, this.form)
                .then(res => {
                    this.categories.unshift(res.data);
                    this.form.name = null;
                });
            },
            destroy(slug,index){
                axios.delete('/api/category/' + slug)
                .then(res => this.categories.splice(index,1))
            },
            edit(index){
                this.form.name = this.categories[index].name;
                this.editSlug = this.categories[index].slug;
                this.categories.splice(index, 1);
            }
        },
        created() {
            if(!User.admin()){
                this.$router.push('/forum');
            }
            axios.get('/api/category')
                .then(res => this.categories = res.data.data)
        }
    }
</script>

<style scoped>

</style>
