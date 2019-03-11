<template>
    <b-container no-gutters class="pf-header w-100 text-center p-0 col-md">
        <div v-if="header" v-bind:style="{'backgroundImage': 'url(\'/' + header.bgUrl + '\')' }" class="bg-image h-100 d-flex flex-column align-items-center justify-content-around position-relative">
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
        <div v-if="header.rounded_image" id="photo_identite" v-bind:style="{ 'backgroundImage': 'url(\'/' + header.rounded_image + '\')' }" class="d-md-none"></div>
    </b-container>
</template>
<style scoped>
    div.bg-image {
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

</style>
<script>
    
    import { mapGetters } from 'vuex';
    import VScrollin from "vue-scrollin";

    export default {
        components: {
            VScrollin,

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
            ])
        }
    }
</script>
