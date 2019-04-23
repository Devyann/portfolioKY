<template>
    <ScaleRotate>
        <router-link class="routeur-item" v-for="(route, index) in routes" :key="route.name" :to="route.name"><i :class="route.icon"></i><span>{{ route.nom }}</span></router-link>
    </ScaleRotate>
</template>
<style scoped>
    span {
        line-height: 1;
    }
    a {
        color : #373a47;
        text-decoration: none;
    }
</style>
<script>

import { ScaleRotate } from 'vue-burger-menu';
export default {
    components: {
        ScaleRotate
    },
    data () {

        return {
            
            lastClicked: '',
//            routes: this.$router.options.routes
        }
    },
    computed: {
        routes: function() {
            var router = this.$router.options.routes;
            var routes = router.filter((route) => { return route.path != '/'; });
            return routes;
        }
    },
    methods: {

    },
    created() {
        
    }
}
</script>
