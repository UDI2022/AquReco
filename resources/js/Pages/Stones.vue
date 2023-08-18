<template>
    <Header />
    <StonesCom :is-logged-in="isLoggedIn" />
    <ChooseProducts />
    <ContactLink />
    <Footer />
</template>
<script>
import Header from "../Components/Header.vue";
import StonesCom from "../Components/StonesCom.vue";

export default {
    components: {
        Header,
        StonesCom,
    },
    data() {
        return {
            isLoggedIn: false,
        };
    },
    methods: {
        getLoginStatus() {
            if(this.$inertia.page.props.auth.user) {
                this.isLoggedIn = true;
                console.log("User is logged in");
            } else {
                this.isLoggedIn = false;
                console.log("User is not logged in");
            }
        },
    },
    mounted(){
        this.getLoginStatus();
    },
};
</script>