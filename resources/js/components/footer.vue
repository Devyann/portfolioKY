<template>
    <div class="container footer-block d-flex flex-column justify-content-center align-content-center section">
            <div class="text-center center-block d-flex justify-content-around align-content-center">
                <a href="https://www.github.com"><i id="social-fb" class="fab fa-github-square social"></i></a>
                <a href="https://www.linkedin.com"><i id="social-tw" class="fab fa-linkedin social"></i></a>
                <a href="mailto:yannkhe@gmail.com"><i id="social-em" class="fas fa-envelope social"></i></a>
            </div>
    </div>      
</template>
<style scoped>
    /* social icons footer */
    i{
        font-size: 48px;
    }
    .social:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
    }
    .social {
        -webkit-transform: scale(0.8);
        /* Browser Variations: */

        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }

   /*
       Multicoloured Hover Variations
   */

    #social-fb:hover {
        color: #3B5998;
    }
    #social-tw:hover {
        color: #4099FF;
    }
    #social-gp:hover {
        color: #d34836;
    }
    #social-em:hover {
        color: #f39c12;
    }
</style>
<script>
    
    export default {
        components: {
           
        },
        data() {
            
            return {

            }
        },
        mounted() {

        }
    }
</script>
