<template>
    <b-container id="page-wrap" class="pf-main no-gutters col-lg-12">
        <div class="d-flex flex-column align-items-center justify-content-between h-100">
            <b-container class="pf-router-content no-gutters h-75 container col-lg-12 d-flex justify-content-center parallax-wrapper">
                <router-view></router-view>
            </b-container>  
            <b-container id="radial_menu" class="h-25 d-md-none">
                <radial-menu
                style="margin: auto; margin-top: 15%; background-color: white"
                :itemSize="50"
                :radius="120"
                :angle-restriction="180">
                  <radial-menu-item 
                    v-for="(route, key) in routes" 
                    :key="key" 
                    style="background-color: red" 
                    @click="() => handleClick(route)">
                    <router-link  :to="{ name : route.path }" :key="key" style="text-transform:capitalize;">{{route.name}}</router-link>
                  </radial-menu-item>
                </radial-menu>
                <div style="color: rgba(0,0,0,0.6); margin-top: 16px;" class="text-center">{{ lastClicked }}</div>
            </b-container>
        </div>
    </b-container>
</template>
<style scoped>
    .container{
        padding-left: 0px;
        padding-right: 0px;
    }
</style>
<script>

import { RadialMenu,  RadialMenuItem } from 'vue-radial-menu';

export default {
  components: {
    RadialMenu,
    RadialMenuItem,
  },
  data () {
        
    
    console.log(this.$route.name); 
    return {
//      items: ['foo', 'bar', 'hello', 'world', 'more', 'items'],

        lastClicked: 'click on something!',
        routes: [
                    {
                        name: 'Accueil',
                        path: 'home'
                    },

                    {
//                        name: 'Produits',
//                        path: 'products'
                    }
                ]
    }
  },
  methods: {
    handleClick (route) {
      this.lastClicked = route.name;
      this.$store.commit('setPageRouting', this.lastClicked);
    }
  },
  created() {
    this.$store.dispatch('getData');
//    console.log(this.$route.params.id);
    if (this.$route.name === null) {
        this.$router.push({ name: 'home'});
    }
    
//    console.log(this.$store.state.page);
  }
}
</script>
