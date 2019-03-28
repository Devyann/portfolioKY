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
            routes: this.$router.options.routes
        }
    },
    computed: {

    },
    methods: {

    },
    created() {
        
    }
}
</script>
