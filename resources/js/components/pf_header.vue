<template>
    <b-container no-gutters class="pf-header w-100 text-center p-0">
        <!--<b-img :src="require('../../assets/images/home_main.jpg')" fluid alt="Responsive image" />-->
        <div :style="background" class="h-100 d-flex flex-column align-items-center justify-content-around">
        <b-row no-gutters>
            <b-col sm="auto">
                <h1 class="pf-site-title text-white">{{ header.siteTitle }}</h1>                
            </b-col>
        </b-row>
        <b-row no-gutters>
            <b-col sm="auto">
                <h3 class="pf-site-subtitle text-white">{{ header.siteSubtitle }}</h3>                            
            </b-col>
        </b-row>
        </div>
    </b-container>
</template>
<script>
    export default {
            
        data() {
            
            return {
                  background: "background-image: url('/images/home_main.jpg');background-size: cover;background-position: center;",
                  header: {
                      siteTitle: 'Yannick Khemaja',
                      siteSubtitle: 'Développeur Web'
                  }
            }
        },
        mounted() {

        }
    }
</script>
