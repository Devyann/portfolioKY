<template>
    <b-container no-gutters class="pf-main-post w-100 text-center">
        <b-card :title="post.title"
                :sub-title="post.subtitle"
                v-for="(post, key, index) in posts"
                :key="key">
            <p class="card-text" v-html="post.content"></p>
            <b-link v-for="(link, key, index) in post.links"
                    :key="key"
                    :href="link.href"
                    class="card-link">{{ link.name }}</b-link>
        </b-card>
    </b-container>
</template>
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
