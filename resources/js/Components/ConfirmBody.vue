<template>
  <div id="confirm">
    <div class="confirmtitle">
      <h1>確認画面</h1>
    </div>
    <div class="form-group">
      <label><h2>お名前</h2></label>
      <p>{{ name }}</p>
    </div>
    <div class="form-group">
      <label><h2>メールアドレス</h2></label>
      <p>{{ email }}</p>
    </div>
    <div class="form-group">
      <label><h2>お問い合わせ内容</h2></label>
      <p>{{ message }}
      </p>
    </div>
    <form method="post" action="/Complete">
      <input type="hidden" name="name" :value="name" />
      <input type="hidden" name="email" :value="email" />
      <input type="hidden" name="inquiry" :value="message" />
      <button type="submit" class="button16" @click="submitForm">送信</button>

    </form>
  </div>
</template>

<script setup>
import { defineProps, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia-vue3';

const props = defineProps(['name', 'email', 'message']);

// 送信ボタン押したらコンソールに出力する関数
function submitForm() {
  console.log('ボタンがクリックされました');
  // サーバーにデータを送信
  Inertia.post('/Complete', {
    name: props.name,
    email: props.email,
    inquiry: props.message
  });
}
</script>

<style>
#confirm{
  margin: 10%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.confirmtitle h1 {
  font-size: 2.5rem;
  text-align: center;
}
.form-group{
  width: 100%;
}
.form-group h2{
  font-size: 2rem;
  text-align: left;
}
.form-group p {
  border: 1px solid;
  padding: 3%;
  border-radius: 10px;
  width: 100%;
  font-size: 1.2rem;
}
.button16 {
  width: 100%;
  display: flex;
  justify-content: center;
  margin: 10% 0;
  padding: 10px 20px 10px 20px;
  border-radius: 20px;
  background-color: #fff;
  color: #000;
  font-size: 1.5rem;
  border: 1px solid #982176;
  font-weight: 600;
  box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
}
</style>
