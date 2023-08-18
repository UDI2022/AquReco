<template>
    <Header />
    <ChoosePackage />
    <LayoutPackage />
    <FishPackage />
    <ChooseProducts />
    <ShopSample />
    <AlreadyPackage />
    <ContactLink />
    <Request />
    <Footer />
</template>
  
<script>
export default {
  mounted() {
    const role = this.$page.props.role;
    console.log("Role:", role);
  },
};
</script>
<style>
</style>