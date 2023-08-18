<template>
    <div id="woods">
      <div class="woodsbody">
          <ProductsIntroWood />
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
                    <div class="woodLists" v-for="wood in woodLists" :key="wood.id">
                      
                        <div class="wood-container">
                          <img :src="getWoodImageSrc(wood.wood_id)" :alt="wood.imageAltText">
                        
                        </div>
                      <Favorite_wood :woodId="wood.wood_id" :userEmail="userEmail" @favorite-click="toggleFavorite(wood.wood_id)"/>
                        <div class="woodinfo">
                            <div class="woodname">
                                {{ wood.name }}
                            </div>
                            <div class="woodprice">
                                <p>￥{{ wood.price }}</p>
                            </div>
                        </div>
                    </div>
              </div>
      </div>
    </div>
</template>


<script>
import axios from "axios";
import Favorite_wood from './Favorite_wood.vue';

export default {
  components: {
    Favorite_wood,
  },
    props: {
      isLoggedIn: {
        type: Boolean,
        required: true,
      },
    },
    data() {
      return {
        partArray: [],
        sizes: [],
        favorites: [],
        woodLists: [],
        originalWoodLists: [],
        selectedSize: null,
        userEmail: "",
      };
    },
    methods: {
      /*woodsizeの取得メソッド */
      async sizeForPart() {
        try {
          const response = await axios.get("/woodsizedata");


          //partArray にwoodsize.id,sizedetailを格納する
          this.partArray = response.data.map((data) => {
              return {
                  sizedetail: data.sizedetail,
                  size: data.id,
              };
          });

          console.log("partArray:", this.partArray);
        } catch (error) {
          console.error(error);
          this.partArray = [];
        }
        },
      /*woodおよびwoodsize取得のメソッド */
      async fetchWoodData() {
        try {
          const response = await axios.get("/wooddata");
          this.woodLists = response.data;
          const woodsizes = response.data.map((wood) => wood.size);

        } catch (error) {
          console.error(error);
        }
      },

      // woodSizeCategory[]を作成する
      async onSizeSelect(){
        console.log(`onSizeSelect called with selectedSize: ${this.selectedSize}`);
        if (this.selectedSize) {
        
          //選択されたsizedetailに対応するsizeの取得
          this.storeSelectedSize(this.selectedSize)
          const selectedSize = this.getSizeFromSizeDetail(this.selectedSize);
          console.log(selectedSize);

            if(selectedSize !== null) {
                // サイズが選択されたら該当するwoodの情報をフィルタリングする
                this.woodLists = this.originalWoodLists.filter((wood) =>
                wood.size === selectedSize);
            }
        } else {
          //未選択の場合は全てのwood情報を表示

          this.woodLists = [... this.originalWoodLists]; // 元のwoodListsから再度データを取得する
          // ユーザーがサイズを再度選択できるようにselectedSizeをリセットする
          this.selectedSize = null;
        }
      },
      getWoodImageSrc(woodId){
        return `/image/wood/${woodId}.jpg`;
      },
      
      // ユーザが選択したsizedetailに対応するsizeを取得するメソッド
      getSizeFromSizeDetail(sizeDetail) {
          const matchedPart = this.partArray.find(
              (part) => {
                    const isMatch = part.sizedetail === sizeDetail;
                    console.log(`Checking if part ${part.sizedetail} matches ${sizeDetail}: ${isMatch}`); 
                    return isMatch;
              }
          );
          const size = matchedPart ? matchedPart.size : null;


          // Debugging line: output the matched size to the console
          console.log("Matched size:", size);

          return size;
      },
      // ユーザが選択したsizedetailに対応するsizeを配列に格納するメソッド
      storeSelectedSize() {
            console.log(`storeSelectedSize called with sizeDetail: ${this.selectedSize}`); 
            const selectedSize = this.getSizeFromSizeDetail(this.selectedSize);
            if (selectedSize !== null) {
                this.selectedSizeArray = [selectedSize];
            } else {
                this.selectedSizeArray = this.sizes;
            }

                // 選択されたサイズに対応する商品のidを取得して配列に格納する
                this.selectedSizeArrayIds = this.woodLists
                .filter((wood) => wood.size === selectedSize)
                .map((wood) => wood.wood_id);


                    // サイズが選択されていない場合、すべてのサイズに対応する商品のidを取得する
                if (selectedSize === null) {
                    const allIds = this.woodLists.map((wood) => wood.wood_id);
                    this.selectedSizeArrayIds = [...new Set([...this.selectedSizeArrayIds, ...allIds])];
                }

                    // コンソールにselectedSizeArrayIdsの値を出力
                console.log('selectedSizeArrayIds:', this.selectedSizeArrayIds);
        },
    },
    async mounted() {
    // woodsizeの取得
    await this.sizeForPart();
    // woodの取得
    await this.fetchWoodData();
    this.originalWoodLists = [...this.woodLists];
    this.userEmail = this.isLoggedIn ? this.$inertia.page.props.auth.user.email : '';
    console.log("User email:", this.userEmail); 
        
        
      },
    };

</script>

<style>
    #woods .button6{
        display: none;
    }
    .woodsbody{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    .narrow {
        display: flex;
        justify-content: center;
        flex-direction: column;
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
    .woodLists {
      display: flex;
      align-items: center;
      margin: 0 7%;
    }
    .wood-container {
      flex: 0 0 50%;
      padding: 2%;
    }

    .woodinfo {
      flex: 1;
      padding-left: 20px;
      font-size: 1.8rem;
    }
</style>