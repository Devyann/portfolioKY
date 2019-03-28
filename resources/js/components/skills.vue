<template>
    <b-container class="d-flex flex-column align-items-center justify-content-center no-gutters h-100 col-md">
        <div class="bg-skills h-100 w-100 d-flex flex-column justify-content-around align-items-end">
            <b-row class="mx-5">
                <b-col sm="auto">
                    <h1 class="pf-site-title text-white p-2"><v-scrollin :speed="60" :misses="2">Compétences</v-scrollin></h1>                
                </b-col>
            </b-row>
            <b-row class="h-50 mx-5">
                <b-col>
                </b-col>
                <b-col>
                </b-col>
                <b-col>
                    <b-card
                        overlay
                        img-src="/images/home_office.jpeg"
                        title="Langages"
                        sub-title="Subtitle"
                        class="h-100"
                        text-variant="white"
                    > 
                        <!--<div class="bg-mask h-100 w-100">-->
                            <b-card-body>
                                    <ul>
                                        <li v-for="(skill, i) in skillSet" :key="i" class="skill-bar">
                                                <div :style="{ width: skill.initLevel + '%'}">
                                                        <label>{{ skill.area }}</label>
                                                        <label>{{ skill.initLevel + '%' }}</label>
                                                </div>
                                        </li>
                                    </ul>
                            </b-card-body>
                        <!--</div>-->  
                        <div v-if="skills">{{ posts }}</div>
                    </b-card>
                </b-col>
            </b-row>
        </div>
    </b-container>
       
</template>
<style scoped>
    div.bg-skills{
        background-image: url('/images/home_office.jpeg');
        background-size: cover;
        background-color: #ffc10717;
        background-blend-mode: darken;
    }
    h1 {
        background: rgba(0, 0, 0, 0.6);
        font-size: 2.2rem;
        font-family: 'Audiowide', cursive;
    }
    img.card-img{
        height: 100%;
        
    }
    .card{
        border: 1px solid rgba(0, 0, 0, 0.72);
    }
    .bg-mask{
        background: #ffc10717;
    }

</style>
<script>
    import VScrollin from "vue-scrollin";
    
    export default {
        components: {
            VScrollin
        },
        data () {

          return {
                posts: [],
                lastClicked: 'skills',
                intervalID: '',
                increment: 1,
                skillSet: [
                        { area: 'java', initLevel: 0, level: 50 },
                        { area: 'c/c++', initLevel: 0, level: 60 },
                        { area: 'python', initLevel: 0, level: 70 },
                        { area: 'php', initLevel: 0, level: 80 },
                        { area: 'css3', initLevel: 0, level: 90 },
                        { area: 'html5', initLevel: 0, level: 100 }
                ]
              
          }
        },
        mounted: function() {
		this.intervalID = setInterval(() => {
			this.getLevelProgress(this.increment)
		}, 10);
                let postsList = this.$store.state.page.posts;
                console.log(postsList);
                postsList.forEach(function(el){
                    this.posts.push(el);
                });
	},
	methods: {
		getLevelProgress: function(value) {
			this.skillSet.forEach(function(data) {
				data.initLevel = Math.min(Math.floor(data.initLevel+value), data.level)
			})
		}
	},
	beforeDestroy: function() {
		clearInterval(this.intervalID)
	},
        created() {
            
            this.lastClicked = this.$route.name;
            this.$store.commit('setPageRouting', this.lastClicked);
            this.$store.dispatch('getData');
            
            
        },
        computed: {

            skills() {  
//                console.log(this.$store.state.page);
                
                
            },
        }
    }
</script>
