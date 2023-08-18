<template>
    <div v-show="true" id="menu" :style="menuStyle">
        <div id="navmenu">
            <div class="navtopborder"></div>

            <div class="navtoppage navmenu">
                <a href=/TopPage>
                    <h2>Top Page</h2>
                </a>
            </div>

            <div class="navmenu">
                <LogOut />
            </div>
              <!-- 未ログインの表示 -->
            <div class="navlogin navmenu">
              <a href="/Login" >
                <h2>Login</h2>
              </a>
            </div>

            <div class="navchooseconcept navmenu">
                <a href="Concept">    
                    <h2>Choose Concept</h2>
                </a>
            </div>
            <div class="navshoprecommend navmenu">
                <a href="Recommend">    
                    <h2>Shop Recommend</h2>
                </a>
            </div>
            <div class="navfavrite navmenu">
                <a href="Favorite">    
                    <h2>Favorite</h2>
                </a>
            </div>
            <div class="navq&a navmenu">
                <a href=/Trouble >   
                    <h2>Q&A</h2>
                </a>
            </div>
            <div class="navcontact navmenu">
                <a href=/Contact>
                    <h2>Contact</h2>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import LogOut from './LogOut.vue';

export default {
  props: ['isOpen'],
  data() {
    return {
      isLoggedIn: false,
      position: {
        top: '0%',
        right: this.isOpen ? '0%' : '100%',
      },
    };
  },
  created() {
    this.position.right = this.isOpen ? '0%' : '-100%';
  },
  computed: {
    menuStyle() {
      return {
        position: 'fixed',
        top: this.position.top,
        right: this.position.right,
        transition: 'all 1s',

      };
    },
  },
  watch: {
    isOpen(newValue) {
      if (newValue) {
        this.position = {
          top: '0%',
          right: '0%',
        };
      } else {
        this.position = {
          top: '0%',
          right: '-100%',
        };
      }
    },
  },
};
</script>





<style>
#menu {
    background-color: #749BC2;
    height: 87%;
    width: 80%;
    z-index: 40;
}
#navmenu {
    padding: 20% 0% 5% 20%;
}
.navmenu h2{
    font-size: 4vh;
    border-bottom: 3px solid;

}
.navtopborder {
    border-top : 8px solid;
    width: 100%;
    padding: 0;
}
</style>
