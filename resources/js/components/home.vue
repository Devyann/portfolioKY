<template>
    <b-container class="d-flex flex-column align-items-center justify-content-between no-gutters h-100">
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
           PfHeader
        },
        data() {
            
            return {

            }
        },
        mounted() {

        }
    }
</script>
