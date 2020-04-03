<template>
    <v-container>
        <form @submit.prevent="login">
            <v-text-field
                label="E-mail"
                v-model="form.email"
                type="text"
            ></v-text-field>
            <v-text-field
                label="Password"
                v-model="form.password"
                type="password"
            ></v-text-field>

            <v-btn color="green" type="submit">Login</v-btn>
            <router-link to="/signup"><v-btn>Sign Up</v-btn></router-link>
        </form>
    </v-container>

</template>

<script>
    export default {
        data(){
            return {
                form: {
                    email: null,
                    password: null,
                }
            }
        },
        created(){
            if(User.loggedIn()){
                this.$router.push({name: 'forum'}) //redirect
            }
        },
        methods:{
            login(){
                User.login(this.form);
            }
        }
    }
</script>

<style scoped>

</style>
