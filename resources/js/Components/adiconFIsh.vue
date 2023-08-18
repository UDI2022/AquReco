<template>
  <div id="fishicon" @click="fishClicked" :style="fishStyle">
    <a href="/">
      <i :class="iconClass" class="fas fa-fish"></i>
    </a>

    </div>
</template>
  
<script>
  export default {
    computed: {

      iconClass() {
      // ログイン中の場合は 'logged-in' クラスを追加
      return this.$inertia.page.props.auth.user ? 'fas fa-fish logged-in' : 'fas fa-fish';
      },
    },

    mounted() {
        if (this.$inertia.page.props.auth.user) {
            const userEmail = this.$inertia.page.props.auth.user.email;
            console.log("User is logged in");
            console.log("User email:", userEmail);
        } else {
            console.log("User is not logged in");
        }
    }
  }
</script>

<style scoped>
i.fas.fa-fish,
i.fas.fa-fish.logged-in {
  color: #F11A7B;
  font-size: 3rem;
}

i.fas.fa-fish.logged-in {
  color: #FFD400;
  font-size: 12rem;
}

</style>
  