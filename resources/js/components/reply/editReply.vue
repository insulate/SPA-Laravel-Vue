<template>
    <div>
        <vue-simplemde v-model="reply.reply" ref="markdownEditor" />
        <v-card-actions>
            <v-list-item class="grow">
                <div>
                    <v-btn icon @click="update()">
                        <v-icon color="green">mdi-check</v-icon>
                    </v-btn>
                    <v-btn icon @click="cancel()">
                        <v-icon color="red">mdi-cancel</v-icon>
                    </v-btn>
                </div>
            </v-list-item>
        </v-card-actions>
    </div>
</template>

<script>
    export default {
        props:['reply'],
        methods:{
            update(){
                axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`, {body: this.reply.reply})
                .then(res => this.cancel());
            },
            cancel(){
                EventBus.$emit('cancelEditing');
            }
        }
    }
</script>

<style scoped>

</style>
