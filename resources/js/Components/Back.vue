<template>
  <div class=back :class="{ 'transparent': isScrolling, 'opaque': !isScrolling }"
      @click="handleMenuClick">
        <a id="back" @click="$router.back()" >Back</a>
  </div>
</template>
<style>

.back{
        transition: opacity 0.3s ease;
}
    .transparent {
      opacity: 0;
    }

    .opaque {
      opacity: 1;
    }
#back {
  position: fixed;
  bottom: 0;
  right: 0;
  margin: 20px;
  padding: 10px 20px;
  background-color: #d6e4ff;
  color: #000;
  font-size: 1.2rem;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  z-index: 15;
  opacity: 0.8;
}

</style>

<script>
import iconFish from './iconFish.vue'
import Menu from './Menu.vue'

export default {
  data() {
    return {
      isScrolling: false,
    }
  },
  methods: {
    handleScroll() {
      this.isScrolling = true;
      clearTimeout(this.scrollTimer);
      this.scrollTimer = setTimeout(() => {
        this.isScrolling = false;
      }, 300); // 100ミリ秒以内のスクロールであればスクロール中と判定
    },
  },
  mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  },
};
</script>