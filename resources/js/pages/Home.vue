<script setup lang="ts">
    import axios, { AxiosError } from 'axios'
    import { ref } from 'vue'
    import { useRouter } from 'vue-router'

    const router = useRouter()

    const form = ref(<{email: string, password: string}>{})
    const user = ref(<{id: number, name: string, email: string} | undefined>undefined)
    const errorMessage = ref(<string | undefined>undefined)

    const login = async () => {
        await axios.get('/sanctum/csrf-cookie')
        try {
            const {data} = await axios.post('/api/login', form.value)
            user.value = data.data
        } catch (error) {
            //console.error(error)
            form.value.password = ''
            if (error instanceof AxiosError)
                errorMessage.value = error.message
        }
    }
</script>

<template>
    <template v-if="user">
        <RouterLink :to="{name: 'me'}">Me</RouterLink>
        <pre>{{user}}</pre>
    </template>
    <template v-else>
        <div class="error" v-if="errorMessage">{{errorMessage}}</div>
        <div>
            <label for="email">E-mailadres:</label>
            <input id="email" name="email" type="text" v-model="form.email">
        </div>
        <div>
            <label for="password">Wachtwoord:</label>
            <input id="password" name="password" type="password" v-model="form.password">
        </div>
        <button @click="login">Inloggen</button>
    </template>
</template>

<style>
    .error {
        color: #c00;
    }
</style>
