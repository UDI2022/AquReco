<template>
    <div id="plants">
      <div class="plantsbody">
          <ProductsIntroPlant />
              <div class="narrow">
                  <h2>商品の絞り込み</h2>
                  <!--プルダウンの内容は未設定-->
                  <select v-model="selectedFamily" class="button7" @change="onFamilySelect">
                      <option v-for="part in partArray" :key="part.familyname" :value="part.familyname">
                        {{ part.familyname}}
                      </option>
                  </select>
                  <h3>※店頭には他の種類もあります。</h3>
              </div>
              <div class="">
                  <h1><!--{{ familyname }}--></h1>
                    <div class="plantLists" v-for="plant in plantLists" :key="plant.id">
                        <div class="plant-container">
                          <img :src="getPlantImageSrc(plant.plant_id)" :alt="plant.imageAltText">
                        </div>
                    <Favorite_plant :plantId="plant.plant_id" :userEmail="userEmail" @favorite-click="toggleFavorite(plant.plant_id)"/>
                        <div class="plantinfo">
                            <div class="plantname">
                                {{ plant.name }}
                            </div>
                            <div class="plantph">
                                要求水質：{{ plant.ph.content }}
                            </div>
                            <div class="plantdifficulty">
                                育成難易度：{{ calculateDifficulty(plant) }}
                            </div>
                            <div class="plantplace">
                                植栽場所：
                                    <span v-if="plant.background">後景</span>
                                    <span v-if="plant.midground">中景</span>
                                    <span v-if="plant.forground">前景</span>
                            </div>
                            <div class="plantprice">
                                <p>￥{{ plant.price }}</p>
                            </div>
                        </div>
                    </div>
              </div>
      </div>
    </div>
</template>

<script>
import axios from "axios";
import Favorite_plant from './Favorite_plant.vue';

export default {
    components: {
        Favorite_plant,
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
            families: [],
            plantLists: [],
            originalPlantLists: [],
            selectedFamily: null,
            userEmail: "",
        }
    },
    methods:{
        /* plantfamilydataの取得メソッド */
        async familyForPart(){
            try {
                const response = await axios.get("/plantfamilydata");
                //partAttay にplantspecies.id,familynameを格納する
                this.partArray = response.data.map((data) => {
                    return {
                        familyid: data.id,
                        familyname: data.familyname,
                    };
                });

                console.log("partArray:", this.partArray);
            } catch (error) {
                console.error(error);
                this.partArray = [];
            }
        },

        /* plant,plantspecies,ph 取得のメソッド */
        async fetchPlantData() {
            try {
                const response = await axios.get("/plantdata");
                this.plantLists = response.data;
                const plantfamily = response.data.map((plant) => plant.family);
                // plantfamily に関して重複を削除して格納
                this.family = [...new Set(plantfamily)];
                
                // コンソールに出力
                console.log("plantLists:", this.plantLists);
                console.log("family:", this.family);
            } catch (error) {
                console.error(error);
            }
        },

        // []を作成する
        async onFamilySelect() {
            console.log(`onFamilySelect called with selectedFamily:, ${this.selectedFamily}`); // 選択されたFamlyNameを表示＝選択リストの文字そのもの
            if (this.selectedFamily) {
                // 選択されたFamilynameに対応するfamily(id)の取得
                this.storeSelectedFamily(this.selectedFamily)
                const selectedFamily = this.getFamilyFromFamilyName(this.selectedFamily);
                console.log(selectedFamily);

                if (selectedFamily !== null) {
                // 分類が選択されたら該当するplantの情報をフィルタリングする

                this.plantLists = this.originalPlantLists.filter((plant) => 
                    plant.family === selectedFamily);
                }
                console.log(this.plantLists);
            } else {
                // 未選択の場合はすべてのplant情報を表示

                this.plantLists = [...this.originalPlantLists]; // 元のplantデータから再度データを取得
                // ユーザーが分類を再度選択できるようにselectedFamilyをリセットする
                this.selectedFamily = null;
            }
        },

        // ユーザーが選択したfamilynameに対応するfamilyを配列に格納するメソッド
        storeSelectedFamily() {
            console.log(`storeSelectedFamily called with familyname: ${this.selectedFamily}`);
            const selectedFamily = this.getFamilyFromFamilyName(this.selectedFamily);
            console.log('selectedFamily:', selectedFamily); // 選択されたfamilynameに対応するfamilyをコンソールに出力
            if (selectedFamily !== null) {
                this.selectedFamilyArray = [selectedFamily];
            } else {
                this.selectedFamilyArray = this.families;
            }
                console.log('this.plantLists1:', this.plantLists);
                //選択された分類に対応する商品のidを取得して配列に格納
                this.selectedFamilyArrayIds = this.plantLists
                .filter((plant) => plant.family === selectedFamily)
                .map ((plant) => plant.plant_id);
                console.log('this.plantLists2:', this.selectedFamilyArrayIds);

                // 分類が選択されていない場合、全ての分類に対応する商品のidを取得する
                if (selectedFamily === null) {
                    const allIds = this.plantLists.map((plant) => plant.plant_id);
                    this.selectedFamilyArrayIds = [...new Set([...allIds])];
                }

                //コンソールにselectedFamilyArrayIdsの値を出力
                console.log('selectedFamilyArrayIds:', this.selectedFamilyArrayIds);
        },

        // ユーザーが選択したfamilynameに対応するfamily を取得するメソッド
        getFamilyFromFamilyName(selectedFamily) {
            console.log(`getFamilyFromFamilyName called with selectedFamily: ${selectedFamily}`);
            console.log('partArray:', this.partArray);
            const matchedPart = this.partArray.find(

                (part) => {
                    const isMatch = part.familyname === selectedFamily
                    console.log(`Checking if part ${part.familyname} matches ${selectedFamily}: ${isMatch}`);
                    return isMatch;
                }
            );
            const family = matchedPart ? matchedPart.familyid : null;

            //Debug
            console.log(`Matched family: ${family}`);

            return family;
            
        },


        getPlantImageSrc(plantId){
            return `/image/plant/${plantId}.jpg`;
        },
        


    },
    async mounted() {

        await this.familyForPart();
        // familyの取得
        await this.fetchPlantData();

        this.originalPlantLists = [...this.plantLists];
        this.userEmail = this.isLoggedIn ? this.$inertia.page.props.auth.user.email : '';
        console.log("User email:", this.userEmail); 

    },
    computed: {
        // プロパティ内で各要素の値を計算するメソッドを定義
        calculateDifficulty() {
            return (plant) => {
                // デフォルトの難易度を1とし、他の値が1の場合に1ずつ加算する
                const difficulty = 1 +
                    (plant.co2 + plant.light + plant.temp + plant.other);

                return difficulty.toString();
            };
        },
    },
}

</script>


<style>
    #plants .button6{
        display: none;
    }
    .plantbody{
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
    .plantLists {
        display: flex;
        align-items: center;
        margin: 0 7% 0 3%;
    }
    
    .plantph {
        font-size: 0.9rem;
    }
    .plantdifficulty {
        font-size: 0.9rem;
    }
    .plantplace {
        font-size: 0.9rem;
    }   

    .plantprice {
        font-size: 0.9rem;
    }
    .plant-container {
        flex: 0 0 50%;
        padding: 2%;
    }
    .plantname {
        font-size: 1.3rem;
    }

    .plantinfo {
        flex: 1; /* 右側の情報部分は残りのスペースを占める */
        padding-left: 20px; /* 右側の情報と画像の間に余白を設定 */
        font-size: 1.5rem;
    }

    .plantsbody {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
</style>