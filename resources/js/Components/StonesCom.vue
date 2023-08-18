<template>
    <div id="stones">
        <div class="stonesbody">
            <ProductsIntroStone />
            <div class="narrow">
                <h2>商品の絞り込み</h2>
                <select v-model="selectedSize" id="stonelist" class="button7" @change="onSizeSelect">
                  <option v-for="part in partArray" :key="part.sizedetail" :value="part.sizedetail">
                    {{ part.sizedetail}}
                  </option>
                </select>
                <h3>※店頭には他の種類もあります。</h3>
            </div>
            <div class="stonesizecategory">
                <div class="stoneLists" v-for="stone in stoneLists" :key="stone.id">
                    <div class="stone-container">
                        <img :src="getStoneImageSrc(stone.stone_id)" :alt="stone.imageAltText">
                    </div>
                <Favorite_stone :stoneId="stone.stone_id" :userEmail="userEmail" @favorite-click="toggleFavorite(stone.stone_id)"/>
                    <div class="stoneinfo">
                        <div class="stonename">
                            {{ stone.name }}
                        </div>
                       <div class="stoneprice">
                            <p>￥{{ stone.price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from "axios";
import Favorite_stone from './Favorite_stone.vue';

export default {
    components: {
        Favorite_stone,
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
            stoneSizeCategory: [],
            stoneLists: [],
            originalStoneLists: [],
            selectedSize: null,
            userEmail: "",
        };
    },
    methods: {
        /*stonesizeの取得メソッド */
        async sizeForPart() {
            try {
            const response = await axios.get("/stonesizedata");


            //partArray にstonesoze.id,sizedetailを格納する
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

        /*stoneおよびstonesize取得のメソッド */
        async fetchStoneData() {
            try {
                const response = await axios.get("/stonedata");
                this.stoneLists = response.data;
                const stonesizes = response.data.map((stone) => stone.size);
                // sizedetailに関して重複を削除して格納
                this.sizes = [...new Set(stonesizes)];
            } catch (error) {
                console.error(error);
            }
        },

        // stoneSizeCategory[]を作成する
        async onSizeSelect(){
            console.log(`onSizeSelect called with selectedSize: ${this.selectedSize}`);
            if (this.selectedSize) {
            
            //選択されたsizedetailに対応するsizeの取得
            this.storeSelectedSize(this.selectedSize)
            const selectedSize = this.getSizeFromSizeDetail(this.selectedSize);

                if(selectedSize !== null) {
                    // サイズが選択されたら該当するstoneの情報をフィルタリングする
                    this.stoneSizeCategory = { sizedetail: this.selectedSize };
                    this.stoneLists = this.originalStoneLists.filter((stone) =>
                    stone.size === selectedSize
                    );
                }
            } else {
            //未選択の場合は全てのwood情報を表示
            this.stoneSizeCategory = {};
            this.stoneLists = [... this.originalStoneLists]; // 元のstomeListsから再度データを取得する
            // ユーザーがサイズを再度選択できるようにselectedSizeをリセットする
            this.selectedSize = null;
            }
        },
        getStoneImageSrc(stoneId){
            return `/image/stone/${stoneId}.jpg`;
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
            console.log(`storeSelectedSize called with sizeDetail: ${this.selectedSize}`); // Add this line for debugging
            const selectedSize = this.getSizeFromSizeDetail(this.selectedSize);
            if (selectedSize !== null) {
                this.selectedSizeArray = [selectedSize];
            } else {
                this.selectedSizeArray = this.sizes;
            }

                // 選択されたサイズに対応する商品のidを取得して配列に格納する
                this.selectedSizeArrayIds = this.stoneLists
                .filter((stone) => stone.size === selectedSize)
                .map((stone) => stone.stone_id);


                // サイズが選択されていない場合、すべてのサイズに対応する商品のidを取得する
                if (selectedSize === null) {
                    const allIds = this.woodLists.map((wood) => stone.stone_id);
                    this.selectedSizeArrayIds = [...new Set([...this.selectedSizeArrayIds, ...allIds])];
                }

                    // コンソールにselectedSizeArrayIdsの値を出力
                console.log('selectedSizeArrayIds:', this.selectedSizeArrayIds);
        },
    },
    async mounted() {
        console.log("User email:", this.userEmail); 
        // stonesizeの取得
        await this.sizeForPart();
        // stoneの取得
        await this.fetchStoneData();
        this.originalStoneLists = [...this.stoneLists]; 
        this.userEmail = this.isLoggedIn ? this.$inertia.page.props.auth.user.email : '';
    },
};
</script>


<style>
    #stones .button6{
        display: none;
    }
    .stonesbody{
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
    .stoneLists {
      display: flex;
      align-items: center;
      margin: 0 7%;
    }
    .stone-container {
      flex: 0 0 50%;
      padding: 2%;
    }

    .stoneinfo {
      flex: 1; /* 右側の情報部分は残りのスペースを占める */
      padding-left: 20px; /* 右側の情報と画像の間に余白を設定 */
      font-size: 1.8rem;
    }
    
    .stoneinfo {
        flex: 1; /* 右側の情報部分は残りのスペースを占める */
        padding-left: 20px; 
        font-size: 2.3rem;
    }
</style>
