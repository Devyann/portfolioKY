<template>
    <b-container id="page-wrap" class="pf-main no-gutters col-lg-12">
        <div class="d-flex flex-column align-items-center h-100">
            <b-container class="pf-router-content no-gutters container col-lg-12 d-flex justify-content-center parallax-wrapper">
                <router-view></router-view>
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

export default {
  components: {

  },
  data () {
        
 
    return {

        lastClicked: 'click on something!',
        routes: [
                    {
                        name: 'Accueil',
                        path: 'home'
                    },

                ]
    }
  },
    methods: {

    },
    created() {

//        this.$store.dispatch('getData');
//        console.log(this.$route.params.id);
        if (this.$route.name === null) {
            this.$router.push({ name: 'home'});
        }
        

    }
}
</script>
