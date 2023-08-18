<template>
  <div class="headercontent">
    <div class="headertitle">
      <a href="/">
        <h1>{{ 'AQ-RECO' }}</h1>
        <iconFish />
      </a>

      <!-- ハンバーガーメニューアイコンを追加 -->
      <div class="hamburger-menu"
      :class="{ 'transparent': isScrolling, 'opaque': !isScrolling, 'cross': isMenuClicked }"
      @click="handleMenuClick">
        <div class="line line1" :class="{ 'line1-active': isMenuOpen }"></div>
        <div class="line line2" :class="{ 'line2-active': isMenuOpen }"></div>
        <div class="line line3" :class="{ 'line3-active': isMenuOpen }"></div>
      </div>
    </div>

    <!-- メニューを追加 -->
    <div class="header-menu" :class="{ 'open': isMenuOpen }">
      <Menu :is-open="isMenuOpen" :is-logged-in="isLoggedIn" />
    </div>

    <Back />
  </div>
</template>

<script>
import iconFish from './iconFish.vue'
import Menu from './Menu.vue'

export default {
  components: {
    iconFish,
    Menu
  },
  data() {
    return {
      isMenuOpen: false,
      isLoggedIn: false,
      isScrolling: false,
      isMenuClicked: false,
    }
  },
  methods: {
    handleMenuClick() {
      if (!this.isMenuClicked) {
        this.isMenuOpen = true;
      } else {
        this.isMenuOpen = !this.isMenuOpen;
      }
      this.isMenuClicked = !this.isMenuClicked;
    },
    handleFishClicked(isOpen) {
      this.isMenuOpen = isOpen;
      this.isMenuClicked = isOpen;
    },
    handleScroll() {
      this.isScrolling = true;
      clearTimeout(this.scrollTimer);
      this.scrollTimer = setTimeout(() => {
        this.isScrolling = false;
      }, 300); // 100ミリ秒以内のスクロールであればスクロール中と判定
    },
  },
  mounted() {
    if (this.$inertia.page.props.auth.user) {
      this.isLoggedIn = true;
      const userEmail = this.$inertia.page.props.auth.user.email;
      console.log("User is logged in");
      console.log("User email:", userEmail);
    } else {
      console.log("User is not logged in");
    }
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeDestroy() {
    // コンポーネントが破棄される前にイベントリスナーを解除
    window.removeEventListener('scroll', this.handleScroll);
  },
};
</script>

<style scoped>

    .headertitle {
      /*border: 1px solid black; */
      background-color: #91C8E4;
      color: #F0F0F0;
      width: 100%;
    }

    .headercontent {
      display:flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 0 0px 0%;
      background-color: #FFF;
      width: 100%;
      z-index: 1;
      
    }

    .headercontent h1 {
      font-size: 2.5rem;
      margin: 0 0 0 5%;
    }

    .hamburger-menu {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: opacity 0.3s ease;
      position: fixed;
      top: 1%;
      right: 3%;
      width: 15%;
      height: 6vh;
      cursor: pointer;
      z-index: 99;
    }

    .line {
      width: 100%;
      height: 15%;
      background-color: #000;
    }
    .transparent {
      opacity: 0;
    }

    .opaque {
      opacity: 1;
    }

    .cross .line1 {
      transform: rotate(45deg) translateY(5px);
      position: relative;
      top: 50%;
    }

    .cross .line2 {
      opacity: 0;
    }

    .cross .line3 {
      transform: rotate(-45deg) translateY(-5px);
      position: relative;
      bottom: 15%;
    }
</style>
