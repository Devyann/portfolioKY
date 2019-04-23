<template>
    <b-container class="d-flex flex-column align-items-center justify-content-center no-gutters h-100 col-md">
        <div class="bg-skills h-100 w-100 d-flex flex-column justify-content-around align-items-end">
            <b-row class="mx-5">
                <b-col sm="auto">
                    <h1 class="pf-site-title text-white p-2"><v-scrollin :speed="60" :misses="2">Compétences</v-scrollin></h1>                
                </b-col>
            </b-row>
            <b-row class="h-50 mx-5">
                <b-col col lg="8" class="d-flex align-items-start justify-content-start">
                    <p class="text"></p>
                </b-col>
                <b-col col lg="4">
                    <transition name="company" appear>
                            <b-card
                            overlay
                            img-src="/images/home_office.jpeg"
                            title="Développement"
                            class="h-100"
                            text-variant="white"
                            v-if="view == 'skillA'"
                            > 
                                <b-card-body>
                                        <ul>
                                            <li v-for="(skill, i) in skillSetA" :key="i" class="skill-bar">
                                                    <div :style="{ width: skill.initLevel + '%'}">
                                                            <label>{{ skill.area }}</label>
                                                            <label>{{ skill.initLevel + '%' }}</label>
                                                    </div>
                                            </li>
                                        </ul>
                                </b-card-body>
                                <div class="text-right card-button-block">
                                    <b-button size="sm" v-on:click="toggle"><i class="fas fa-arrow-alt-circle-right"></i></b-button>
                                </div>
                            </b-card>
                    </transition>
                    <transition name='company' appear>
                            <b-card
                            overlay
                            img-src="/images/home_office.jpeg"
                            title="Logiciels"
                            class="h-100"
                            text-variant="white"
                            v-if="view == 'skillB'"
                            > 
                                <b-card-body>
                                        <ul>
                                            <li v-for="(skill, i) in skillSetB" :key="i" class="skill-bar">
                                                    <div :style="{ width: skill.initLevel + '%'}">
                                                            <label>{{ skill.area }}</label>
                                                            <label>{{ skill.initLevel + '%' }}</label>
                                                    </div>
                                            </li>
                                        </ul>
                                </b-card-body>
                                <div class="text-right card-button-block">
                                    <b-button size="sm" v-on:click="toggle"><i class="fas fa-arrow-alt-circle-left"></i></b-button>
                                </div>
                            </b-card>
                    </transition>
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
    ul{
        padding-left: 0px;
    }
    .card-button-block{
        padding-right: 1.25em;
    }
    /* base */
    .company {
        backface-visibility: hidden;
        z-index: 1;
    }

    /* moving */
    .company-move {
        transition: all 600ms ease-in-out 50ms;
    }

    /* appearing */
    .company-enter-active {
        transition: all 1s ease-out;
    }

    /* disappearing */
    .company-leave-active {
        transition: all 1s ease-in;
        /*position: absolute;*/
        z-index: 0;
    }

    /* appear at / disappear to */
    .company-enter,
    .company-leave-to {
        opacity: 0;
    }
    /* text scramble */
    .text {
        font-weight: 100;
        font-size: 1.5em;
        color: #FAFAFA;
        font-family: 'Wallpoet', cursive;
        /*background-color: rgba(0, 0, 0, 0.6);*/
    }
    .dud {
        color: #757575;
    }
    
</style>
 
<script>
    import VScrollin from "vue-scrollin";
    import TextScramble from "../TextScramble.js";
    
    export default {
        components: {
            VScrollin, 
        },
        data () {

          return {
                view: 'skillA', 
                skills: '',
                skillSetA: [
                    { area: 'HTML', initLevel: 0, level: 90 },
                    { area: 'PHP', initLevel: 0, level: 80 },
                    { area: 'SQL', initLevel: 0, level: 80 },
                    { area: 'JAVASCRIPT', initLevel: 0, level: 80 },
                    { area: 'CSS', initLevel: 0, level: 70 }
                ], 
                
                skillSetB: [
                    { area: 'LARAVEL', initLevel: 0, level: 90 },
                    { area: 'LINUX', initLevel: 0, level: 80 },
                    { area: 'WINDOWS', initLevel: 0, level: 80 },
                    { area: 'VUEJS', initLevel: 0, level: 80 },
                    { area: 'APACHE', initLevel: 0, level: 100 }
                ], 

                visible: true,
                lastClicked: 'skills',
                intervalID: '',
                increment: 1,
                
                phrases: ['jQuery', 'Développement Web', 'Développement application',
                    'FuelPHP', 'npm', 'Linux', 'Conception', 'Wordpress', 'Drupal', 'Photoshop',
                    'Bootstrap','Debian', 'Ubuntu', 'Windows'],
                el: '',
                fx: '',
                counter: 0,
                
          }
        },
        mounted: function() {
		
                this.intervalID = setInterval(() => {
			this.getLevelProgress(this.increment, this.getSkills)
		}, 10);
                
                this.el = document.querySelector('.text');
                this.fx = new TextScramble(this.el);
                this.fx.setText(this.phrases[this.counter]).then(() => {
                    setTimeout(this.next, 800);
                });
                this.counter = (this.counter + 1) % this.phrases.length;
	},
	methods: {
		getLevelProgress: function(value, skillList = '') {
                        
                        if (this.view == 'skillA'){

                            this.skillSetA.forEach(function(data) {
                                
				data.initLevel = Math.min(Math.floor(data.initLevel+value), data.level);
                            });
                        }
                        if (this.view == 'skillB'){
                            this.skillSetB.forEach(function(data) {
				data.initLevel = Math.min(Math.floor(data.initLevel+value), data.level);
                            });
                        }
			
		},
                toggle: function(){
                    
                    return (this.view == 'skillA') ? this.view = 'skillB' : this.view = 'skillA';
                    
                },
                next: function(){
                    this.fx.setText(this.phrases[this.counter]).then(() => {
                        setTimeout(this.next, 800);
                    });
                    this.counter = (this.counter + 1) % this.phrases.length;
                },
                

                
	},
	beforeDestroy: function() {
		clearInterval(this.intervalID)
	},
        created() {
            
            this.lastClicked = this.$route.name;
            this.$store.commit('setPageRouting', this.lastClicked);
            this.$store.dispatch('getData');
            this.skills = this.getSkills;
        },
        computed: {
            getSkills: function(){
                               
                return this.$store.getters.skillList;
                
            }
        }
    }
    
//    window.addEventListener("load", function(event) {
//        const phrases = ['jQuery', 'Développement Web', 'Développement application',
//            'FuelPHP', 'npm', 'Linux', 'Conception', 'Wordpress', 'Drupal', 'Photoshop',
//            'Bootstrap','Debian', 'Ubuntu', 'Windows'];
//
//            const el = document.querySelector('.text');
//            const fx = new TextScramble(el);
//
//            let counter = 0;
//            const next = () => {
//                fx.setText(phrases[counter]).then(() => {
//                  setTimeout(next, 800);
//                });
//                counter = (counter + 1) % phrases.length;
//            }
//
//        next();
//    });
</script>
