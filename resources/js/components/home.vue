<template>
    <b-container class="d-flex flex-column align-items-center no-gutters h-100 col-md">
        <PfHeader></PfHeader>
        <PfMain></PfMain>
    </b-container>
       
</template>
<script>
    import PfMain from "./pf_main.vue";
    import PfHeader from "./pf_header.vue";
    
    export default {
        components: {
           PfMain,
           PfHeader,
        },
        data() {
            
            return {

            }
        },
        mounted() {

        },
        created() {
        this.lastClicked = this.$route.name;
        this.$store.commit('setPageRouting', this.lastClicked);
        this.$store.dispatch('getData');

    }
    }
</script>
