<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <Question
                    v-for="question in questions"
                    :key="question.path"
                    :data=question
                ></Question>
                <!-- :data คือการส่ง parameter ไปยัง question.vue -->
            </v-flex>
            <v-flex xs4>
                <app-sidebar></app-sidebar>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import Question from './question';
    import AppSidebar from './Appsidebar';

    export default {
        components: {Question,AppSidebar},
        data() {
            return {
                questions: []
            }
        },
        created() {
            axios.get('/api/question')
                .then(res => this.questions = res.data.data)
                .catch(error => console.log(error));
        }

    }
</script>

<style scoped>

</style>
