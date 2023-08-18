<template>
  <div
    id="fishicon"
    v-if="showFishIcon"
    @click="fishClicked"
    :style="fishStyle"
  >
    <i :class="iconClass" class="fas fa-fish"></i>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      position: {
        top: '1%',
        right: '30%',
      },
      isOpen: false,
      showFishIcon: true, // iconFishコンポーネントの表示制御フラグ
    };
    },
    computed: {
      fishStyle() {
        return {
          position: 'fixed',
          top: this.position.top,
          right: this.position.right,
          transition: 'all 1s',
          'z-index': 20, 
        };
      },
      iconClass() {
      // ログイン中の場合は 'logged-in' クラスを追加
      return this.$inertia.page.props.auth.user ? 'fas fa-fish logged-in' : 'fas fa-fish';
      },
    },
    methods: {
      
      handleScroll() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      this.showFishIcon = scrollTop === 0;
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
        window.addEventListener('scroll', this.handleScroll)
      },
        beforeDestroy() {
    // 省略...

    // コンポーネントが破棄される前にイベントリスナーを解除
    window.removeEventListener('scroll', this.handleScroll);
  
},
    };
  
</script>

<style scoped>
i.fas.fa-fish,
i.fas.fa-fish.logged-in {
  color: #F11A7B;
  font-size: 3rem;
}

i.fas.fa-fish.logged-in {
  color: #FFD400;
}
</style>
  