<script setup>
  import { useField, useForm } from 'vee-validate';
  import * as yup from 'yup';
  import { ref, watch } from 'vue';
  import { Inertia } from '@inertiajs/inertia';

  const form = useForm();

  const { value: name, errorMessage: nameError } = useField(
    'name',
    yup.string().required()
  );
  const { value: email, errorMessage: emailError } = useField(
    'email',
    yup.string().required().email()
  );
  const { value: message, errorMessage: messageError } = useField(
    'message',
    yup.string().required().max(10000, 'お問い合わせ内容は最大10000文字です')
  );


  // 入力内容を保存する配列
  const formDataArray = ref([]);

// 送信ボタンが押されたことをコンソールに出力
const logSubmit = () => {
  // 入力内容を配列に追加
  formDataArray.value.push({
    name: name.value,
    email: email.value,
    message: message.value
  });

  // 配列の内容をコンソールに出力
  console.log(formDataArray.value);
  if (formDataArray.value.length > 0 && formDataArray.value[formDataArray.value.length - 1].message !== '') {
  window.location.href = '/Confirm';
 
  }
};



</script>


<template>
  <div id="contactbody">
    <div class="contacttitle">
      <h1>Contact</h1>
    </div>
    <form @submit.prevent="submitForm" class="contact-form">
      <div class="form-group">
        <label for="name"><h2>お名前</h2></label>
        <input id="name" type="text" v-model="name" />
        <p>{{ nameError }}</p>
      </div>

      <div class="form-group">
        <label for="email"><h2>メールアドレス</h2></label>
        <input id="email" type="text" v-model="email" />
        <p>{{ emailError }}</p>
      </div>

      <div class="form-group">
        <label for="message"><h2>お問い合わせ内容</h2></label>
        <textarea id="message" v-model="message"></textarea>
        <p>{{ messageError }}</p>
      </div>

      <button @click="logSubmit" type="submit" class="button16">送信</button>
    </form>
  </div>
</template>


<style scoped>
#contactbody{
  margin: 10%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.contacttitle h1{
  font-size: 2.5rem;
  text-align: center;
}
.contact-form{
  width: 100%;
}
.contact-form h2{
  font-size: 2rem;
  text-align: left;
}
.form-group{
  text-align: left;
  margin-bottom: 10px;
}
.form-group #name {
  width: 100%;
}
.form-group #email {
  width: 100%;
}
.form-group #message {
  width: 100%;
  height: 50vh;
}

.form-group p {
  border: none;
  padding: 3%;
  width: 100%;
  font-size: 1.2rem;
  color: red;
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
