import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);
/*
    Import des composants
 */
import Home from './components/home.vue';


// 2. Définition des routes
// Chaque route doit être mappée à un composant
const routes = [
    {
        path: '/vueapp/public/home',
        name: 'home',
        component: Home
    },
//    {
//        path: '/vueapp/public/products',
//        name: 'products',
//        component: Products
//    }
]


export default new VueRouter({
    history: true,
    mode: 'history',
    routes
})