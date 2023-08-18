<template>
        <Header />
        <TanksCom :is-logged-in="isLoggedIn" />
        <ChooseProducts />
        <ContactLink />
        <Footer />
</template>

<script>
import Header from "../Components/Header.vue";
import TanksCom from "../Components/TanksCom.vue";


export default {
  components: {
    Header,
   TanksCom,
    // その他のコンポーネント
  },
  data() {
    return {
      isLoggedIn: false, // ログインフラグを初期化
    };
  },
  methods: {
    // ログイン情報を取得
    getLoginStatus() {
      if (this.$inertia.page.props.auth.user) {
        this.isLoggedIn = true;
        console.log("User is logged in");
      } else {
        this.isLoggedIn = false;
        console.log("User is not logged in");
      }
    },
  },
  mounted() {
    // ページがロードされた後にログイン情報を取得
    this.getLoginStatus();
  },
};
</script>