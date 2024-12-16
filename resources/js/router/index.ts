import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import Me from '../pages/Me.vue'

const routes = [
    {name: 'home', path: '/',   component: Home },
    {name: 'me',   path: '/me', component: Me },
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})
