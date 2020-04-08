<template>
    <v-card
        class="mx-auto"
    >
        <v-card-title>
            {{ data.title }}
        </v-card-title>

        <v-card-subtitle class="pb-0">{{ data.user }} said {{ data.created_at }}</v-card-subtitle>

        <v-card-text class="text--primary">
            {{ data.body }}
        </v-card-text>

        <v-card-actions>
            <v-btn
                color="teal"
                text
            >
                5 Replies
            </v-btn>

            <v-btn v-if="own"
                color="orange"
                   @click="edit"
            >
                Edit
            </v-btn>

            <v-btn v-if="own" @click="destroy()"
                color="red"
            >
                Delete
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
    export default {
        props:['data'],
        data(){
            return {
                own : User.own(this.data.user_id),
            }
        },
        methods:{
            destroy(){
                axios.delete('/api/question/' + this.data.slug)
                .then(res => this.$router.push('/forum'))
                .catch(error => console.log(error.response.data))
            },
            edit(){
                EventBus.$emit('startEditing');
            }
        }
    }
</script>

<style scoped>

</style>
