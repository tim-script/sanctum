<script setup lang="ts">
    import axios, { AxiosError } from 'axios'
    import { ref } from 'vue'

    const getUser = async () => {
        try {
            const {data} = await axios.get('/api/user')
            user.value = data.data
        } catch (error) {
            //console.error(error)
            if (error instanceof AxiosError)
                errorMessage.value = error.message
        }
    }

    const user = ref(undefined)
    const errorMessage = ref(<string | undefined>undefined)

    getUser()
</script>

<template>
    <template v-if="user">
        <pre>{{user}}</pre>
    </template>
    <template v-if="errorMessage">
        <div class="error" v-if="errorMessage">{{errorMessage}}</div>
        <RouterLink :to="{name: 'home'}">Inloggen</RouterLink>
    </template>
</template>
