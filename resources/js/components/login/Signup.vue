<template>
    <v-container>
        <form @submit.prevent="signup">
            <v-text-field
                label="Name"
                v-model="form.name"
                type="text"
            ></v-text-field>
            <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>

            <v-text-field
                label="E-mail"
                v-model="form.email"
                type="text"
            ></v-text-field>
            <span class="red--text" v-if="errors.email">{{ errors.email[0] }}</span>

            <v-text-field
                label="Password"
                v-model="form.password"
                type="password"
            ></v-text-field>
            <span class="red--text" v-if="errors.password">{{ errors.password[0] }}</span>

            <v-text-field
                label="Password"
                v-model="form.password_confirmation"
                type="password"
            ></v-text-field>

            <v-btn color="green" type="submit">Sign Up</v-btn>
            <router-link to="/login"><v-btn>Login</v-btn></router-link>

        </form>
    </v-container>
</template>

<script>
    export default {
        data(){
            return {
                form:{
                    name: 'biiwz',
                    email: 'biiwz@admin.com',
                    password: 123456,
                    password_confirmation: 123456
                },
                errors: {}
            }
        },
        created(){
            if(User.loggedIn()){
                this.$router.push({name: 'forum'}) //redirect
            }
        },
        methods:{
            signup(){
                axios.post('/api/auth/signup', this.form)
                    .then(res => {
                        User.responseAfterLogin(res);
                        this.$router.push('forum');
                    })
                    .catch(error => {
                        //console.log(error);
                        this.errors = error.response.data.errors;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
