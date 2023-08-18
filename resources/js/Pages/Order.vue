<template>
  <Header />
  <div id="order">
    <div class="ordertitle">
      <h1>Put Order Number</h1>
    </div>
    <div class="ordermessage">
      <h2>お客様がお待ちのオーダー番号を入力してください。</h2>
      <h2>注文リストを表示できます。</h2>
    </div>

    <div class="orderform">
      <h2>オーダー番号入力</h2>
      <input class="orderforminput" type="text" v-model="orderNumber" placeholder="オーダー番号を入力" />
    </div>
    <div class="orderaccess">
      <a @click="getOrder" class="button13">オーダー出力</a>
    </div>
  </div>
  <ContactLink />
  <Footer />
</template>

<script>
export default {
  data() {
    return {
      orderNumber: ''
    };
  },
  methods: {
    async getOrder() {
      if (this.orderNumber.trim() === '') {
        alert('オーダー番号を入力してください。');
        return;
      }

      // アクセスするルートのURLを仮定しています。
      let url = '/api/order/' + this.orderNumber;

      try {
        let response = await this.$inertia.get(url);
        console.log(response);
      } catch (error) {
        console.error('An error occurred:', error);
      }
    }
  }
};
</script>

<style>
#order {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.ordertitle h1 {
  font-size: 3rem;
  text-align: center;
}

.ordermessage h2 {
  font-size: 1.5rem;
  margin: 0 10%;
}

.orderform {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.orderform h2 {
  font-size: 1.7rem;
  text-align: center;
}

.orderforminput {
  width: 70%;
  padding: 10px; 
}

.orderaccess {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 70%;
}

.button13 {
  margin: 5% 0 0 0;
  padding: 2% 5%;
  border-radius: 10px;
  background-color: #fff;
  color: #000;
  font-size: 1.5rem;
  border: 1px solid #982176;
  font-weight: 400;
  box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
  text-align: center;
}
</style>