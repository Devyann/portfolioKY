<template>
    <b-container no-gutters class="pf-main-post w-100 text-center h-100 d-flex flex-column justify-content-between col-md section">
<!--        <b-card :title="post.title"
                :sub-title="post.subtitle"
                v-for="(post, key, index) in posts"
                :key="key">
            <p class="card-text" v-html="post.content"></p>
            <b-link v-for="(link, key, index) in post.links"
                    :key="key"
                    :href="link.href"
                    class="card-link">{{ link.name }}</b-link>
        </b-card>-->
<div v-for="(post, key, index) in posts" :key="key" class="w-100 d-flex flex-column align-items-center col-md justify-content-around block-article">
    <div class="pf-main-post-left w-50 h-50 d-flex flex-column justify-content-center">
        <h3>{{ post.title }}</h3>
        <h4>{{ post.subtitle }}</h4>
    </div>
    <div class="pf-main-post-right w-50 h-50 d-flex flex-column justify-content-center">
        <p>{{ post.content }}</p>
    </div>
</div>
    </b-container>
</template>
<style scoped>
    .pf-main-post{
        background: #f2f2f6;
        min-height: max-content;
        
    }
</style>
<script>
    export default {
            
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
</script>
