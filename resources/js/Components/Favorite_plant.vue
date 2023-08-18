<template>
    <div>
      <button @click="toggleFavorite"><i :class="favoriteIcon"></i></button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: {
      plantId: {
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
        return this.favorites.includes(this.plantId) ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
      },
    },
    methods: {
      async toggleFavorite() {
      console.log('Inside toggleFavorite, plantId:', this.plantId);
  // お気に入りアイコンがクリックされたときの処理
  if (this.favorites.includes(this.plantId)) {
    // すでにお気に入りに登録されている場合は削除する
    this.favorites = this.favorites.filter((id) => id !== this.plantId);
  } else {
    // お気に入りに登録されていない場合は追加する
    this.favorites.push(this.plantId);
    const dataToSend = { tankId: this.plantId, email: this.userEmail };
    console.log('Sending request with data:', dataToSend); // ここでログ出力
    // サーバーにお気に入り登録のリクエストを送信
    try {
      await this.addToFavorites(this.plantId);
      console.log('お気に入り登録成功');
    } catch (error) {
      console.error('お気に入り登録エラー:', error);
    }
  }
  console.log('お気に入りに登録されたID:', this.favorites);
  console.log("User email:", this.userEmail);
},

        addToFavorites(plantId) {
      // サーバーに対してPOSTリクエストを送信し、お気に入り登録を実行
      return axios.post('/api/add-to-favorites-plant', { plantId, email: this.userEmail });
    },
    },
    mounted() {
      console.log('Received plantId:', this.plnatId);
    }


};
</script>