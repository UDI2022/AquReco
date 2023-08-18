<template>
    <div>
      <button @click="toggleFavorite"><i :class="favoriteIcon"></i></button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: {
      woodId: {
        type: Number,
        required: true,
      },
      userEmail: {
        type: String,
        required: true,
        },
    },
    data() {
      return {
        favorites: [], // 選択されたアイコンに対応するIDを格納する配列
      };
    },
    computed: {
      favoriteIcon() {
        // お気に入りアイコンのクラスを返す
        return this.favorites.includes(this.woodId) ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
      },
    },
    methods: {
      async toggleFavorite() {
        // お気に入りアイコンがクリックされたときの処理
        if (this.favorites.includes(this.woodId)) {
          // すでにお気に入りに登録されている場合は削除する
          this.favorites = this.favorites.filter((id) => id !== this.woodId);
        } else {
          // お気に入りに登録されていない場合は追加する
          this.favorites.push(this.woodId);
          // サーバーにお気に入り登録のリクエストを送信
          try {
            await this.addToFavorites(this.woodId);
            console.log('お気に入り登録成功');
          } catch (error) {
            console.error('お気に入り登録エラー:', error);
          }
        }
        console.log('お気に入りに登録されたID:', this.favorites);
        console.log("User email:", this.userEmail); 
        },
        addToFavorites(woodId) {
      // サーバーに対してPOSTリクエストを送信し、お気に入り登録を実行
      return axios.post('/api/add-to-favorites', { woodId, email: this.userEmail });
    },
    },

};
</script>




  