<template>
    <v-card
        class="mt-2"
    >
            <v-card-title>
                <router-link :to="data.path">
                    {{ data.title }}
                </router-link>
            </v-card-title>

        <v-card-subtitle class="pb-0">{{ data.user }} said {{ data.created_at }}</v-card-subtitle>

        <v-card-text class="text--primary">
            {{ data.body }}
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        props:['data'] //รับ parameter มาจาก Forum
    }
</script>

<style scoped>

</style>
