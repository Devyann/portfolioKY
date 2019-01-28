/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'es6-promise/auto'

import Vue from 'vue'; // Importing Vue Library
window.Vue = Vue;
import VueRouter from 'vue-router'; // importing Vue router library
import router from './router';
Vue.use(VueRouter);
import BootstrapVue from 'bootstrap-vue'; // importing bootstrap-vue
Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import { RadialMenu,  RadialMenuItem } from 'vue-radial-menu';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('index', require('./components/index').default);


const app = new Vue({
    el: '#app',
    router
});