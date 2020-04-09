<template>

    <div>
        <vue-simplemde v-model="body" ref="markdownEditor" />
        <v-btn color="green" @click="submit()">
            Create
        </v-btn>
    </div>
</template>

<script>
    export default {
        props:['questionSlug'],
        data(){
            return {
                body: null
            }
        },
        methods:{
            submit(){
                axios.post('/api/question/' + this.questionSlug + '/reply', {body: this.body})
                .then(res => {
                    this.body = '';
                    EventBus.$emit('newReply', res.data.reply);
                });
            }
        }
    }
</script>

<style scoped>

</style>
