import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';
import router from './router'

Vue.use(Vuex);

export default new Vuex.Store({
     
    state: {
        page: [],
        pageRouting: 'home'
    },
    getters: {
//        bgUrl: (state) => {
//            return state.page.header.bgUrl;
//        },
        skillList: (state) => {
            
            if(state.page.posts){
                
                
                if (state.pageRouting === 'skills'){
                    
                    var skillsPosts = state.page.posts;
                    var skillSet = [];
                    skillsPosts.forEach(function(el){
                        console.log(el);
                        var content = el.content.replace(' ', '');
                        var contentArray = content.split(',');
                        console.log(contentArray);
                        contentArray.forEach(function(element){
                            var skillRow = element.split('-');
                            console.log(skillRow);
                            var rowReturn = { area: skillRow[0], initLevel: 0, level: Number(skillRow[1].replace('%', '')) };
                            console.log(rowReturn);
                            skillSet.push(rowReturn);
                            console.log(skillSet);
                        });
                    });
                    console.log(skillSet);
                    return skillSet;
                }
            }
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
            this.state.page = [];
            Axios.defaults.headers.common['Content-Type'] = 'application/json';
            let data = (await Axios.get('http://127.0.0.1:8000/api/' + this.state.pageRouting)).data;
            context.commit("setData", data);
        }
    }
});