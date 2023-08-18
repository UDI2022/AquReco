<template>
    <div id="selecttankslink">
        <div class="selecttankslinktitle">
            <h1>入れる水槽を選択</h1>
        </div>
        <div class="selecttankslinkmessage">
            <h2>設置する場所に合わせて選択しましょう</h2>
        </div>
        <!--
        <div class="selecttankslinkbutton">
            <a href="/tankss" class="button11">水槽を選択する</a>
        </div>
        -->
        <div class="selecttankslinklist">
            <div v-if="selectedItems.length > 0">
                <div class="item" v-for="(item, index) in selectedItems" :key="index">
                    <p class="selecttankslinkname">商品名: {{ item.name }}</p>
                    <div class="flex-container">
                        <div>
                        選択した個数:
                        <select v-model="item.quantity">
                            <option v-for="n in 10" :value="n">{{ n }}</option>
                        </select>
                        </div>
                        <div>
                        予算: {{ item.price * item.quantity }}
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
              <p>何も選択されていません。</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      // 仮のデータ
      selectedItems: [
        { id: 1, name: "商品1", quantity: 2, price: 500 },
        { id: 2, name: "商品2", quantity: 1, price: 1000 },
        // { id: 3, name: "商品3", quantity: 3, price: 300 },
      ],
    };
  },
};
</script>

<style>
    #selecttankslink::before{
        content: '';
        position: absolute;
        right: 0vw;
        width: 50vw;
        height: 30%;
        background-color: #CEE6F3;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -3;
    }
    #selecttankslink {
        margin-top: 5%;
    }
    .selecttankslinktitle h1{
        font-size: 2rem;
    }
    .selecttankslinktitle{
        border: 1px solid;
        margin: 0 7%;
        text-align: center;
        background-color: #fff;
        border-radius: 10px;
    }
    .selecttankslinkmessage h2{
        font-size: 1rem;
        margin: 0 10%;
    }
    .selecttankslinkbutton{
        margin-top: 5%;
        text-align: center;
    }
    .button11 {
        justify-content: center;
        margin: 10% 0 0 0;
        padding: 2% 5%;
        border-radius: 10px;
        background-color: #fff;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        font-weight: 400;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
    
    .selecttankslinklist .item {
        padding: 1rem;
        margin: 0% 12% 0 12%; 
        border: 1px solid #982176;
        border-radius: 10px;
        box-shadow: 3px 3px 3px 0px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .flex-container {
        display: flex;
        justify-content: space-between;
    }
    p .selecttankslinkname {
        font-size:2rem;
    }
</style>