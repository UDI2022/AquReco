<template>
    <Header />
    <What />
    <Search />
    <Request />
    <ContactLink />
    <Footer />
</template>
<script>
export default {
    mounted() {
        if (this.$inertia.page.props.auth.user) {
            console.log("User is logged in");
        } else {
            console.log("User is not logged in");
        }
    }
}
</script>
