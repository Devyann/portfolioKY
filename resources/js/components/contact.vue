<template>
    <b-container class="d-flex flex-column align-items-center justify-content-center no-gutters h-100 col-md special-padding-top">
        <h2>Formulaire de contact</h2>
        <b-alert :show="showAlertValidation" variant="success">
            Formulaire envoyé avec succès
            <br>
            <hr>
            <router-link class="routeur-item" to="home">Retour à l'accueil</router-link>
        </b-alert>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
            <b-row>
                <b-col>
                    <b-form-group
                        label="Nom"
                        label-for="name"
                        id="name"
                        >
                        <b-form-input
                            name="name"
                            type="text" 
                            v-model="form.name"
                            required
                        ></b-form-input>
                        <p id="name-help-block" v-if="validationName" class="error-feedback small">
                            {{ formError.name }}
                        </p>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                        label="Prénom"
                        label-for="surname"
                        id="surname"
                        >
                        <b-form-input
                            name="surname"
                            type="text"
                            v-model="form.surname"
                            required
                        ></b-form-input>
                        <p id="surname-help-block" v-if="validationSurname" class="error-feedback small">
                            {{ formError.surname }}
                        </p>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <b-form-group
                        label="Société"
                        label-for="company"
                        id="company"
                        >
                        <b-form-input 
                            name="company"
                            type="text"
                            v-model="form.company"
                        ></b-form-input>
                        <b-form-text id="company-help-block">
                            
                        </b-form-text>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                        label="E-mail"
                        label-for="email"
                        id="email"
                        >
                        <b-form-input 
                            name="email"
                            type="email"
                            v-model="form.email"
                            required
                            
                        ></b-form-input>
                        <p id="email-help-block" v-if="validationEmail" class="error-feedback small">
                            {{ formError.email }}
                        </p>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-form-group
                label="Message"
                label-for="message"
                id="message"
                >
                <b-form-textarea
                    name="message"
                    size="lg"
                    rows="5"
                    v-model="form.message"
                    required
                ></b-form-textarea>
                <p id="message-help-block" v-if="validationMessage" class="error-feedback small">
                    {{ formError.message }}
                </p>
            </b-form-group>
            <!--<button type="submit" class="btn btn-primary">Envoyer</button>-->
            <b-button type="submit" variant="primary" size="sm">Envoyer</b-button>
            <b-button type="reset" variant="danger" size="sm">Annuler</b-button>
        </b-form>
    </b-container>
       
</template>
<style scoped>
    .error-feedback{
        color: #dc3545;
        margin-top: 0.25em;
        font-style: italic;
    }
    form {
        font-size: smaller;
    }
    .special-padding-top {
        padding-top: 50px;
    }
    h2 {
        font-family: 'Audiowide', cursive;
        margin-bottom: 50px;
    }

</style>
<script>
    
    
    export default {
        components: {
           
        },
        data () {

            return {
                
                show: true,
                showAlertValidation: false,
                form: {
                    name: '',
                    surname: '',
                    company: '',
                    email: '',
                    message:'',
                },
                formError: {
                    name: null,
                    surname: null,
                    company: null,
                    email: null,
                    message: null
                },


            }
        },
        
	methods: {
            onSubmit: function(evt){
//                evt.preventDefault();
                var errorTest = false;
                for (let el in this.formError){
                    if (this.formError[el]){
                        errorTest = true;
                        console.log(el);
                    }
                }
                if (errorTest){
                    evt.preventDefault();
                } else {
                    var formData = new FormData();
                    for (let el in this.form){
                        formData.append(el, this.form[el]);                       
                    }
                    
                    axios.post('http://127.0.0.1:8000/api/contact', formData)
                        .then(response => {
//                            console.log(response);
                            if (response.status == 200){

                                this.show = false;
                                this.showAlertValidation = true;
                            }
                        })
                        .catch(error => {
                            if (error.response.status == 422){
                                console.log(error.response.data.errors.message);
                                alert(error.response.data.errors.message[0]);
                            }
                            
                        });
                    evt.preventDefault();
                }
                
  
                
            },
            onReset: function(evt){
                evt.preventDefault();

                this.form.email = '';
                this.form.name = '';
                this.form.surname = '';
                this.form.company = '';
                this.form.message = '';
                
                this.formError.email = null;
                this.formError.name = null;
                this.formError.surname = null;
                this.formError.company = null;
                this.formError.message = null;
                // Trick to reset/clear native browser form validation state
                this.show = false;
                this.$nextTick(() => {
                  this.show = true
                });
            },
            validEmail: function (email) {
                var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                return re.test(email);
            },
            validMessage: function (message) {
                var re = /(.){49,}/;
                return re.test(message);
            }
	},
	
        created() {

            
        },
        computed: {
            validationEmail() {
                if (!this.form.email) {
                    this.formError.email = 'Email requis.';
                    return true;
                } else if (!this.validEmail(this.form.email)) {
                    this.formError.email = 'Saisir un email valide.';
                    return true;  
                } else {
                    this.formError.email = '';

                    return false;
                }
                                 
            },
            validationName() {
                if (!this.form.name) {
                    this.formError.name = 'Nom requis.';
                    return true;
                } else {
                    this.formError.name = '';

                    return false;
                }
                                 
            },
            validationSurname() {
                if (!this.form.surname) {
                    this.formError.surname = 'Prénom requis.';
                    return true;
                } else {
                    this.formError.surname = '';

                    return false;
                }
                                 
            },
            validationMessage() {
                if (!this.form.message) {
                    this.formError.message = 'Message requis.';
                    return true;
                } else if (!this.validMessage(this.form.message)) {
                    this.formError.message = '50 caractères minimun.';
                    return true;
                } else {
                    this.formError.message = '';

                    return false;
                }
                                 
            },
        }
    }
</script>
