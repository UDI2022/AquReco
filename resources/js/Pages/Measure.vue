<template>
    <Header />
    <div id="measure">
        <div class="measuretitle">
            <h1>トラブルの内容</h1>
        </div>
        <div class="measuremessage">
            <h2>相談内容➀</h2>
            <!--ここはテーブルからデータ挿入-->
        </div>
        <div class="measureshopcomment">
            <h2>ショップからのコメント</h2>
            <h3>テスト用の内容です。
                テスト用の内容です。
                テスト用の内容です。
                テスト用の内容です。
                テスト用の内容です。
                テスト用の内容です。
                テスト用の内容です。
                テスト用の内容です。
                テスト用の内容です。</h3>
        </div>
        <div class="measureproduct">
            <h2>おすすめ対策商品</h2>
        </div>
        <div class="measureproducts">
            <div class="measureproductspart" v-for="(part, index) in favorites" :key="index">
                <div class="measureproductsimg">
                  <img :src="part.image">
                </div>
                <div class="measureproductsinfo">
                  <div class="measureproductsname">
                    <p>{{ part.name }}</p>
                  </div>
                  
                  <div class="measureproductscost">
                    <p>{{ part.cost }}</p>
                  </div>
                </div>
            </div>
        </div>      
    </div>
    <MakeOrder />
    <ContactLink />
    <Footer /> 
</template>
<style>
#measure {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.measuretitle{
    border: 1px solid;
    border-radius: 10px 0 0 0;
    width: 90%;
    margin-left: auto;
    text-align: center;
}
.measuretitle h1 {
    font-size: 3rem;
}
.measuremessage{
    border: 1px solid;
    border-radius: 0 0 0 10px;
    width: 90%;
    margin-left: auto;
    text-align: center;
}
.measuremessage h2 {
    font-size: 1.5rem;
    margin: 0 10%;
}
.measureshopcomment{
    width: 90%;
    border: 1px solid;
    border-radius: 0 10px 10px 0;
    margin-right: auto;
}
.measureshopcomment h2{
    border: 1px solid;
    border-radius: 0 10px 0 0; 
    margin: 0;
    font-size: 1.5rem;
    text-align: center;
}
.measureshopcomment h3{
    border: 1px solid;
    border-radius: 0 0 10px 0;
    padding: 3%;
    font-size: 1.3rem; 
}
.measureproduct{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 5% 0 3% 0;
    width: 100%;
}
.measureproduct h2 {
    font-size: 2rem;
    text-align: center;
} 
.measureproducts{
    margin: 0 7%;
}
.measureproductspart{
    display: flex;
}
.measureproductsimg{
    width: 50%;
}
.measureproductsinfo{
    width: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.measureproductsname{
    font-size: 1.4rem;
    text-align: center;
}
.measureproductscost{
    font-size: 1.3rem;
    text-align: right;
    width: 100%;
}

</style>
<script>
    export default {
        data() {
            return {
                favorites: [
                    {
                        name: 'テスト商品1',
                        image: '/image/sample.jpg',
                        cost: '1000円'
                    },
                    // ... more favorites
                ]
            }
        },
        methods: {
            // removeFavorite(index) {
            //     this.favorites.splice(index, 1);
            // }
        }
    }
</script>