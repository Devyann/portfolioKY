import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);
/*
    Import des composants
 */
import Home from './components/home.vue';
import Skills from "./components/skills.vue";
import Contact from "./components/contact.vue";


// 2. Définition des routes
// Chaque route doit être mappée à un composant
const routes = [
    {
        path: '/',
        redirect: 'home'
    },
    {
        path: '/vueapp/public/home',
        name: 'home',
        component: Home,
        icon: 'fas fa-home',
        nom: 'Accueil'
    },
    {
        path: '/vueapp/public/skills',
        name: 'skills',
        component: Skills,
        icon: 'fas fa-graduation-cap',
        nom: 'Compétences'
    },
    {
        path: '/vueapp/public/contact',
        name: 'contact',
        component: Contact,
        icon: 'fas fa-id-card',
        nom: 'Contact'
    },

]


export default new VueRouter({
    history: true,
    mode: 'history',
    routes
})