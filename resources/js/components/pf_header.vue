<template>
    <b-container no-gutters class="pf-header w-100 text-center p-0">
        <!--<b-img :src="require('../../assets/images/home_main.jpg')" fluid alt="Responsive image" />-->
        <div v-if="header" v-bind:style="{ 'backgroundImage': 'url(\'' + header.bgUrl + '\')' }" class="bg-image h-100 d-flex flex-column align-items-center justify-content-around">
            <b-row no-gutters>
                <b-col sm="auto">
                    <h1 class="pf-site-title text-white">{{ header.siteTitle }}</h1>                
                </b-col>
            </b-row>
            <b-row no-gutters>
                <b-col sm="auto">
                    <h3 class="pf-site-subtitle text-white">{{ header.siteSubtitle }}</h3>                            
                </b-col>
            </b-row>
        </div>
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
    export default {
            
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
