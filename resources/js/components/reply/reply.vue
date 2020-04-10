<template>
    <div class="mt-3">
        <v-card
            class="mx-auto"
        >
            <v-card-title>
                <v-icon
                    large
                    left
                >
                    mdi-twitter
                </v-icon>
                <span class="title font-weight-light">{{ data.user }} said {{ data.created_at }}</span>
            </v-card-title>

            <edit-reply v-if="editing" :reply='data'></edit-reply>
            <v-card-text class="headline font-weight-bold" v-else>
                "{{ data.reply }}"
            </v-card-text>

            <v-card-actions>
                <v-list-item class="grow" v-if="!editing">
                    <div v-if="own">
                        <v-btn icon @click="edit()">
                            <v-icon color="orange">mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn icon @click="destroy()">
                            <v-icon color="red">mdi-delete</v-icon>
                        </v-btn>
                    </div>
                    <v-row
                        align="center"
                        justify="end"
                    >
                        <like :content="data"></like>
                    </v-row>
                </v-list-item>
            </v-card-actions>
        </v-card>
    </div>

</template>

<script>
    import EditReply from './editReply';
    import Like from '../like/like';
    export default {
        props: ['data','index'],
        components: {EditReply,Like},
        data(){
            return{
                editing: false,
                beforeEditReplyBody: '',
            }
        },
        computed:{
            own(){
                return User.own(this.data.user_id);
            },
        },
        methods:{
            destroy(){
                EventBus.$emit('deleteReply',this.index);
            },
            edit(){
                this.editing = true;
                this.beforeEditReplyBody = this.data.reply;
            },
            listen(){
                EventBus.$on('cancelEditing', (reply) => {
                    this.editing = false;
                    if(reply !== this.data.reply){
                        this.data.reply = this.beforeEditReplyBody;
                        this.beforeEditReplyBody = '';
                    }
                });
            }
        },
        created(){
            this.listen();
        }
    }
</script>

<style scoped>

</style>
