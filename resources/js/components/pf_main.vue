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
                posts: [
                    {
                        title: 'Présentation',
                        subtitle: 'En quelques mots',
                        content: 'Bienvenue sur mon portfolio, celui-ci est construit comme une <em>SPA</em> avec Vue.js pour la gestion du Frontend et Laravel pour la partie Backend',
                        links: [
                            {
                                name: 'Contact',
                                href: '#',
                            },
                            {
                                name: 'Curriculum vitae',
                                href: '#'
                            }
                        ]
                    }
                ]
            }
        },
        mounted() {

        }
    }
</script>
