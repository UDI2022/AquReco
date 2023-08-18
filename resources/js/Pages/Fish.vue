<template>
    <Header />
    <FishCom :fishes="fishes" />
    <ContactLink />
    <Footer />
</template>

<script>
import Header from "../Components/Header.vue";
import FishCom from "../Components/FishCom.vue";

export default {
    components: {
        Header,
        FishCom,
    },
    props: {
        fishes: {
            type: Array,
            default: () => []
        }
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
    mounted() {
        this.getLoginStatus();
        // console.log(this.fishes);
    },
};
</script>