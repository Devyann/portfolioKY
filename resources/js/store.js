import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';
//import router from './router'

Vue.use(Vuex);

export default new Vuex.Store({
     
    state: {
        page: [],
        pageRouting: 'home'
    },
    getters: {
        bgUrl: (state) => {
            return state.page.header.bgUrl;
        },
//        rounded_image_url : (state) => {
//            return state.page.header.rounded_image;
//        }
    },
    mutations: {
        setData(state, data) {
            state.page = data;
        },
        setPageRouting(state, data) {
            state.pageRouting = data;
        }
    },
    actions: {
        async getData(context) {
            Axios.defaults.headers.common['Content-Type'] = 'application/json';
            let data = (await Axios.get('http://127.0.0.1:8000/api/' + this.state.pageRouting)).data;
            context.commit("setData", data);
        }
    }
});