<template>
    <div class="text-center">
        <v-menu open-on-hover top offset-y>
            <template v-slot:activator="{ on }">
                <v-btn icon v-on="on">
                    <v-icon :color="color">mdi-clipboard-alert</v-icon> {{ unreadCount }}
                </v-btn>
            </template>

            <v-list>
                <v-list-item v-for="item in unread" :key="item.id">
                    <router-link :to="item.data.path">
                        <v-list-item-title @click="readIt(item)">{{ item.data.question }}</v-list-item-title>
                    </router-link>

                </v-list-item>

                <v-divider></v-divider>

                <v-list-item v-for="item in read" :key="item.id">
                    <v-list-item-title>{{ item.data.question }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                read: {},
                unread: {},
                unreadCount: 0
            }
        },
        created() {
            if(User.loggedIn()){
                this.getNotifications();
            }
        },
        methods:{
            getNotifications(){
                axios.post('/api/notifications')
                .then(res => {
                    console.log(res.data.unRead);
                    this.read = res.data.read;
                    this.unread = res.data.unRead;
                    this.unreadCount = res.data.unRead.length;
                });
            },
            readIt(notification){
                console.log(notification.id);
                axios.post('/api/markAsRead', {id:notification.id})
                .then(res => {
                    this.unread.splice(notification, 1);
                    this.read.push(notification);
                    this.unreadCount--;
                });
            }
        },
        computed:{
            color(){
                return this.unreadCount > 0 ? 'red' : 'red lighten-4';
            }
        }
    }
</script>

<style scoped>

</style>
