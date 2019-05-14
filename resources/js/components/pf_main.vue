<template>
    <b-container no-gutters class="pf-main-post w-100 text-center h-100 d-flex flex-column col-md">
        <div v-for="(post, key, index) in posts" :key="key" class="w-100 d-flex flex-column align-items-center col-md block-article" :class="[ post.bg_image ?  'bg parallax section justify-content-center odd-post'  : 'section even-post' ]" :data-bg-url="[ post.bg_image ?  'url(\'/' + post.bg_image + '\')'  : 'none' ]">
            <div class="pf-main-post-left d-flex flex-column justify-content-center">
                <h3>{{ post.title }}</h3>
                <h4>{{ post.subtitle }}</h4>
            </div>
            <div class="pf-main-post-right d-flex flex-column justify-content-center">
                <p>{{ post.content }}</p>
            </div>
        </div>
        <pffooter></pffooter>
    </b-container>
</template>
<style scoped>
    .pf-main-post{
        background: #f2f2f6;
        min-height: 100vh;
        
    }
    div.pf-main-post-left, div.pf-main-post-right{
        z-index: 1;
    }
    div.block-article{
        min-height: inherit;
    }
    div.block-article.bg{
        min-height: 100vh;
        max-height: 100vh;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    div.bg::after {
        background: url('/images/office.jpeg');
    }
    div.block-article:first-child{
        padding-top: 10%;
    }
    div.odd-post {
        color: #fff;
        padding-top: 11.5em;
        font-weight: 700;
    }
    div.footer-block{
        transform: translate(0, 5.5em);
    }
    
</style>
<script>
    import Pffooter from "./footer.vue";
    export default {
        components: {
            Pffooter
        }, 
        data() {
            
            return {

            }
        },
        mounted() {

        },
        computed: {
            posts() {                
                return this.$store.state.page.posts;
            }
        }
    }
    window.addEventListener("load", function(event) {
        var addRule = (function(style){
            var sheet = document.head.appendChild(style).sheet;
            return function(selector, css){
                var propText = Object.keys(css).map(function(p){
                    return p+":"+css[p]
                }).join(";");
                sheet.insertRule(selector + "{" + propText + "}", sheet.cssRules.length);
                }
            })(document.createElement("style"));
    
        var backgrounds = document.querySelectorAll('div.bg');
    
        backgrounds.forEach(function(bg){
            let bg_url = bg.getAttribute('data-bg-url');
            console.log(bg_url);
            addRule("div.bg::after", {
                background: bg_url
            });
        });
    });
</script>
