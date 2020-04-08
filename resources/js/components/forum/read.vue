<template>
    <div>
        <edit-question v-if="editing"
        :data = question
        ></edit-question>
        <div v-else>
            <show-question :data=question v-if="question"></show-question>
        </div>
        <replies replies="question.replies"></replies>

    </div>
</template>

<script>
    import ShowQuestion from './showQuestion';
    import EditQuestion from './editQuestion';
    import Replies from '../reply/replies';
    export default {
        components: {ShowQuestion,EditQuestion,Replies},
        data(){
            return {
                question: null,
                editing: false
            }
        },
        created(){
            this.listen();
            this.getQuestion();
        },
        methods:{
            listen(){
                EventBus.$on('startEditing',() => {
                    this.editing = true;
                });

                EventBus.$on('cancelEditing', () => {
                    this.editing = false;
                });

            },
            getQuestion(){
                axios.get(`/api/question/${this.$route.params.slug}`)
                    .then(res => this.question = res.data.data);
            }
        }
    }
</script>

<style scoped>

</style>
