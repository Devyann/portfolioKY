<template>
    <b-container no-gutters class="pf-header w-100 text-center p-0">
        <!--<b-img :src="require('../../assets/images/home_main.jpg')" fluid alt="Responsive image" />-->
        <div v-if="header" v-bind:style="{ 'backgroundImage': 'url(\'/' + header.bgUrl + '\')' }" class="bg-image h-100 d-flex flex-column align-items-center justify-content-around position-relative">
            <div class="bg-mask h-100 w-100 d-flex flex-column justify-content-center">
                <b-row no-gutters>
                    <b-col sm="auto">
                        <h1 class="pf-site-title text-white"><v-scrollin :speed="60" :misses="2">{{ header.siteTitle }}</v-scrollin></h1>                
                    </b-col>
                </b-row>
                <b-row no-gutters>
                    <b-col sm="auto">
                        <h3 class="pf-site-subtitle text-white"><v-scrollin :speed="60" :misses="5">{{ header.siteSubtitle }}</v-scrollin></h3>                            
                    </b-col>
                </b-row>
            </div>
        </div>
        <div v-if="rounded_image_url" id="photo_identite" v-bind:style="{ 'backgroundImage': 'url(\'/' + header.rounded_image + '\')' }"></div>
    </b-container>
</template>
<style scoped>
    div.bg-image {
        background-size: cover;
        background-position: center;
    }
</style>
<script>
    
    import { mapGetters } from 'vuex';
    import VScrollin from "vue-scrollin";
    export default {
        components: {
            VScrollin
        },    
        data() {

            return {

            }
        },
        mounted() {
            
        },
        created(){
            
        },
        computed: {
            header() {                
                return this.$store.state.page.header;
            },
            ...mapGetters([
              'bgUrl',
              'rounded_image_url'
            ])
        }
    }
</script>
