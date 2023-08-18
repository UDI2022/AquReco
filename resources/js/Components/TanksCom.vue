<template>
    <div id="tanks">
        <div class="tanksbody">    
            <ProductsIntroTank />
            <div class="narrow">
                <h2>商品の絞り込み</h2>
                <!--tankテーブルから取得しtankdeta配列に格納した情報のうち、tanksize.sizedetailを表示する-->
                <select v-model="selectedSize" id="tanklist" class="button7" @change="onSizeSelect">
                  <option v-for="part in partArray" :key="part.sizedetail" :value="part.sizedetail">
                    {{ part.sizedetail}}
                  </option>
                </select>
                <h3>※店頭には他の種類もあります。</h3>
            </div>
            <div class="tanksizecategory">
                <h1><!--{{ tankSizeCategory.sizedetail }}--></h1>
                <div class="tankLists" v-for="tank in tankLists" :key="tank.id">
                  
                  <div class="tank-container">
                    <img :src="getTankImageSrc(tank.tank_id)" :alt="tank.imageAltText">
                  </div>
                  
                  <Favorite_tank :tankId="tank.tank_id" :userEmail="userEmail" @favorite-click="toggleFavorite(tank.tank_id)"/>
                  
                  <div class="tankinfo">
                    <div class="tankname">
                      {{ tank.name }}
                    </div>
                  <div class="tanksize">
                    <p>W×D×H</p>
                    <p><span>{{ tank.width }} × {{ tank.depth }} × {{ tank.height }}</span></p>
                  </div>
                  <div class="tankprice">
                    <p>￥{{ tank.price }}</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from "axios";
import Favorite_tank from './Favorite_tank.vue';

export default {
    components: {
      Favorite_tank,
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
        selectedSize: null,
        sizes: [], // 空の配列で初期化
        tankSizeCategory: {},
        tankLists: [],
        originalTankLists: [], // 元のtankListsを保持するための配列
        selectedSizeArray: [],
        userEmail: "",
      };
    },
    methods: {
        getTankImageSrc(tankId) {
            return `/image/tank/${tankId}.jpg`;
        },
        // tankテーブルからデータを取得する関数
        async fetchTanksData() {
            try {
                const response = await axios.get("/tankdata");
                this.tankLists = response.data;
                // tankテーブルからtanksizeを取得
                const tankSizes = response.data.map((tank) => tank.size);
                // 重複を削除してsizesに設定
                this.sizes = [...new Set(tankSizes)];
            } catch (error) {
                console.error(error);
            }
        },
        // sizeForPartメソッドを修正
        async sizeForPart() {
            try {
              const response = await axios.get("/tanksizedata");
              const tankSizesData = response.data;

              // partArrayを更新する
              this.partArray = tankSizesData.map((data) => {
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
        storeSelectedSize(sizeDetail) {
            console.log(`storeSelectedSize called with sizeDetail: ${sizeDetail}`); // Add this line for debugging
            const selectedSize = this.getSizeFromSizeDetail(sizeDetail);
            if (selectedSize !== null) {
                this.selectedSizeArray = [selectedSize];
            } else {
                this.selectedSizeArray = this.sizes;
            }

                    // 選択されたサイズに対応する商品のidを取得して配列に格納する
                this.selectedSizeArrayIds = this.tankLists
                .filter((tank) => tank.size === selectedSize)
                .map((tank) => tank.tank_id);


                    // サイズが選択されていない場合、すべてのサイズに対応する商品のidを取得する
                if (selectedSize === null) {
                    const allIds = this.tankLists.map((tank) => tank.tank_id);
                    this.selectedSizeArrayIds = [...new Set([...this.selectedSizeArrayIds, ...allIds])];
                }

                    // コンソールにselectedSizeArrayIdsの値を出力
                console.log('selectedSizeArrayIds:', this.selectedSizeArrayIds);
        },

        // サイズが選択された時に実行される関数
        async onSizeSelect() {
            console.log(`onSizeSelect called with selectedSize: ${this.selectedSize}`);
            if (this.selectedSize) {

            // 選択されたsizedetailに対応するsizeを取得
            this.storeSelectedSize(this.selectedSize);
            // 選択されたsizedetailに対応するsizeを取得
            const selectedSize = this.getSizeFromSizeDetail(this.selectedSize);

                if (selectedSize !== null) {
                    // サイズが選択されたら該当するtankの情報をフィルタリングする
                    this.tankSizeCategory = { sizedetail: this.selectedSize };
                    this.tankLists = this.originalTankLists.filter((tank) =>
                        tank.size === selectedSize
                    );
                }
            }  else {
                // サイズが未選択の場合はすべてのtank情報を表示する
                this.tankSizeCategory = {};
                this.tankLists = [...this.originalTankLists]; // 元のtankListsから再度データを取得する
                // ユーザーがサイズを再度選択できるようにselectedSizeをリセットする
                this.selectedSize = null;
            }
        },
    },
    async mounted() {
        await this.sizeForPart();
        // ページがマウントされた時にデータを取得
        await this.fetchTanksData();
        this.originalTankLists = [...this.tankLists];
        this.userEmail = this.isLoggedIn ? this.$inertia.page.props.auth.user.email : '';
        console.log("User email:", this.userEmail); 
        console.log("displayedTanks:", this.displayedTanks);

    },
};
</script>

<style>
    #tanks .button6{
        display: none;
    }
    .tanksbody{
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
    .tankLists {
      display: flex;
      align-items: center;
      margin: 0 7%;
    }
    .tank-container {
      flex: 0 0 50%;
      padding: 2%;
    }

    .tank-info {
      flex: 1; /* 右側の情報部分は残りのスペースを占める */
      padding-left: 20px; /* 右側の情報と画像の間に余白を設定 */
      font-size: 1.8rem;
    }
</style>