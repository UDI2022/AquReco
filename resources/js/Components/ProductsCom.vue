<template>
    <div id="products">
      <div class="productbody">
          <ProductsIntroProducts />
              <div class="narrow">
                  <h2>商品の絞り込み</h2>
                  <!--プルダウンの内容は未設定-->
                  <select v-model="selectedSize" class="button7" @change="onSizeSelect">
                      <option v-for="part in partArray" :key="part.sizedetail" :value="part.sizedetail">
                        {{ part.sizedetail}}
                      </option>
                  </select>
                  <h3>※店頭には他の種類もあります。</h3>
              </div>
              <div class="">
                  <h1><!--{{ familyname }}--></h1>
                    <div class="productList" v-for="product in productList" :key="product.products_id">
                        <div class="product-container">
                          <img :src="getProductImageSrc(product.products_id)" :alt="product.imageAltText">
                        </div>
                    <Favorite_product :productId="product.products_id" :userEmail="userEmail" @favorite-click="toggleFavorite(product.products_id)"/>
                        <div class="productinfo">
                            <div class="productname">
                                {{ product.name }}
                            </div>
                            <div class="productprice">
                                <p>￥{{ product.cost }}</p>
                            </div>
                        </div>
                    </div>
              </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Favorite_product from './Favorite_product.vue';

export default {
    components: {
        Favorite_product,
    },
        props: {
            isLoggedIn: {
                type:Boolean,
                required: true,
            },
        },
    data() {
        return{
            partArray: [],
            selectedSize: null,
            productList: [],
            originalProductList: [],
            userEmail: "",
        };
    },

    methods: {
        /*tanksizeの取得*/
        async sizeForPart() {
            try {
                const response = await axios.get("/productsizedata");

                // partArray にtanksize.id,sizedetailを格納
                this.partArray = response.data.map((data) => {
                    return {
                        sizedetail: data.sizedetail,
                        size: data.id,
                    };
                });
                /* partArray配列の内、sizedetilが選択肢に格納される */

                console.log("partArray:", this.partArray);
                } catch (error) {
                    console.error(error);
                    this.partArray = [];
                }
            },

        /* products の取得 */
        async fetchProductData(){
            try {
                const response = await axios.get("/productdata");
                this.productList = response.data;
                console.log("productsList:", this.productList);
                } catch (error) {
                    console.error(error);
                }
        },

        // ユーザーが選択したsizedetailに対応するsizeを取得するメソッド
        getSizeFromSizeDetail(sizeDetail) {
            const matchPart = this.partArray.find(
                (part) => {
                    const isMatch = part.sizedetail === sizeDetail;
                    console.log(`Cheking part ${part.sizedetail} matches ${sizeDetail}: ${isMatch}`);
                    return isMatch;
                }
            );
            const size = matchPart ? matchPart.size : null;
            console.log(matchPart);
            console.log("Match size:", size);

            return size;
        },
        /*ユーザが選択したsizedetailに対応するsizeを配列に格納するメソッド */
        storeSelectedSize() {
            console.log(`storeSelectedSize called with sizeDetail: ${this.selectedSize}`);
            const selectedSize = this.getSizeFromSizeDetail(this.selectedSize);
            if (selectedSize !== null) {
                this.selectedSizeArray = [selectedSize];
                console.log(this.selectedSizeArray);
            } else {
                this.selectedSizeArray = this.seizes;
            }

            // 選択されたサイズに対応する商品のidを取得して配列に格納
            this.selectedSizeArrayIds = this.productList
            .filter((product) => product.tanksize === selectedSize)
            .map((product) => product.products_id);

            if (selectedSize === null) {
                const allIds = this.productList.map((product) => product.products_id);
                this.selectedSizeArrayIds = [...new Set([...this.selectedSizeArrayIds, ...allIds])];
            }
            

            // コンソールにselectedSizeArrayIdsの値を出力
            console.log('selectedSizeArrayIds:', this.selectedSizeArrayIds);

        },

        // 選択肢の内容を取得する
        async onSizeSelect(){
            console.log(`onSizeSelect called with selectedSize: ${this.selectedSize}` );
            if(this.selectedSize) {

                this.storeSelectedSize(this.selectedSize)
                const selectedSize = this.getSizeFromSizeDetail(this.selectedSize);
                console.log(selectedSize);

                if(selectedSize !== null){
                    // サイズが選択されたら該当するproductの情報をフィルタリングする
                    this.productList = this.originalProductList.filter((product) => 
                    product.tanksize === selectedSize);
                    
                    console.log(this.productList);
                }
            } else {
                //未選択の場合はすべてのproduct情報を表示
                // クリーンな状態のproductListをセットする
                this.productList = [...this.originalProductList];
                this.selectedSize = null;
            }
        },
        getProductImageSrc(products_id){
            return `/image/product/${products_id}.jpg`;
        },

        },
        async mounted() {
        await this.sizeForPart();
        await this.fetchProductData();
        this.originalProductList = [...this.productList];
        this.userEmail = this.isLoggedIn ? this.$inertia.page.props.auth.user.email : '';
    },
};
</script>


<style>
    #products .button6{
        display: none;
    }
    .productbody{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    .narrow {
        display: flex;
        justify-content: center;
        flex-direction0: column;
        align-items: center;
    }
    
    .button7 {
        margin-bottom: 2%;
        display: flex;
        border-radius: 10px;
        background-color: #fff;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
    .narrow h2{
        font-size: 1.2rem;
        text-align: center;
    }
    .productList {
        display: flex;
        align-items: center;
        margin: 0 7% 0 3%;
    }

    .productprice {
        font-size: 1.8rem;
    }
    .product-container {
        flex: 0 0 50%;
        padding: 2%;
    }
    .productname {
        display: -webkit-box;
        -webkit-line-clamp: 2; /* 最大表示行数 */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .productinfo {
        flex: 1; /* 右側の情報部分は残りのスペースを占める */
        padding-left: 20px; /* 右側の情報と画像の間に余白を設定 */
        font-size: 1.5rem;
    }

    .productsbody {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
</style>