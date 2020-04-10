<template>
    <div>
        <v-btn icon @click="LikeIt()">
            <v-icon class="mr-1" :color="color">mdi-heart</v-icon>
        </v-btn>
        <span class="subheading mr-2">{{ count }}</span>
    </div>
</template>

<script>
    export default {
        props:['content'],
        data(){
            return {
                liked: this.content.liked,
                count: this.content.like_count,
            }
        },
        computed:{
            color(){
                return this.liked ? 'red':'red lighten-4';
            }
        },
        methods: {
            LikeIt() {
                if (User.loggedIn()) {
                    this.liked ? this.decr() : this.incr();
                    this.liked = !this.liked;
                }
            },
            incr() {
                axios.post(`/api/like/${this.content.id}`)
                .then(res => this.count++);
            },
            decr() {
                axios.delete(`/api/like/${this.content.id}`)
                    .then(res => this.count--);
            }
        }
    }
</script>

<style scoped>

</style>
