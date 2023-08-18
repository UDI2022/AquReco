<template>
    <div id="selectstonelink">
        <div class="selectstonelinktitle">
            <h1>入れる石を選択</h1>
        </div>
        <div class="selectstonelinkmessage">
            <h2>水槽のサイズに合わせてご提案。</h2>
            <h2>お魚の行動の邪魔にならないように大きさ・数・形状には注意しましょう。</h2>
        </div>
        <!--
        <div class="selectstonelinkbutton">
            <a href="/stones" class="button11">石を選択する</a>
        </div>
        -->
        <div class="selectstonelinklist">
            <div v-for="(stone) in displayStoneArray" :key="stone.id">

                <div class="stone-container">
                    <!--img-->
                    <img :src="getStoneImageSrc(stone.stone_id)" :alt="stone.imageAltText">
                </div>
                <Favorite_stone :stoneId="stone.stone_id" :userEmail="userEmail" @favorite-click="toggleFavorite(stone.stone_id)"/>
                <div class="stoneinfo">
                    <div class="stonename">
                        {{ stone.name}}
                    </div>
                    <div class="stoneprice">
                        {{ stone.price }}
                    </div>
                    <div class="select-count">
                        <label>個数</label>
                        <select @change="updateSelectedCount(stone.stone_id, $event)">
                            <option value="0">0 個</option>
                            <option v-for="n in Math.floor(localStcost / stone.locost)" :key="n" :value="n">{{ n }} 個</option>
                        </select>
                        <!--
                        <div>{{ Math.floor(localStcost / stone.locost) }}個</div>
                        <div>Debug: localStcost = {{ localStcost }}</div>
                        <div>Debug: stone.locost = {{ stone.locost }}</div>
                        <div>Debug: totalStcost= {{ totalStcost }}</div>
                        -->
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
    data() {
        return {
            stoneArray: [],
            displayStoneArray: [],
            userEmail: "",
            selectedCount: [],
            localStcost:null,
        };
        },
    computed: {
        totalStcost() {
            return this.localStcost - (this.selectedCount.reduce((acc, item) => acc + item.locost * item.count, 0));
        }
        },
    props: {
        stcost: {
            type: Number,
            default: null
            },
        },
    methods: {
        async fetchStoneData() {
            try {
                /*要修正 */
                const response = await axios.get("/stonedata");
                const stonesData = response.data;

                this.stoneArray = stonesData.map(data => {
                        return {
                            stone_id: data.stone_id,
                            size: data.size,
                            upper: data.upper,
                            lower: data.lower,
                            locost: data.cost,
                            name: data.name,
                            price: data.price,
                        };
                    });
                    this.displayStoneArray = [...this.stoneArray];     
                } catch (error) {
                    console.error(error);
                    this.stoneArray = [];
                    this.displayStoneArray = [...this.stoneArray];
                }
        },
        updateSelectedCount(stoneId, event){
            const selectedNumber = parseInt(event.target.value);
            const existingItem = this.selectedCount.find(item => item.stone_id === stoneId );   
            const existingItemCost = this.stoneArray.find(stone => stone.stone_id === stoneId);
            if (selectedNumber === 0 && existingItem) {
                const index = this.selectedCount.indexOf(existingItem);
                this.selectedCount.splice(index, 1);
                } else if (existingItem) {
                    existingItem.count = selectedNumber;
                } else {
                    this.selectedCount.push({
                        stone_id: stoneId,
                        locost: existingItemCost.locost,
                        name: existingItemCost.name,
                        price: existingItemCost.price,
                        count: selectedNumber,
                    });
                }
        },
        getStoneImageSrc(stone_id){
            return `/image/stone/${stone_id}.jpg`;
        },
    },
    watch: {
        stcost(newVal) {
            this.localStcost = newVal;
            if (newVal) {
                this.displayStoneArray = this.stoneArray.filter(stone => stone.locost <= newVal);
            } else {
                this.displayStoneArray = [...this.stoneArray];
            }
            }
        },
    mounted() {
        this.fetchStoneData();
    },
};

</script>

<style>
    #selectstonelink::before{
        content: '';
        position: absolute;
        left: 0vw;
        width: 50vw;
        height: 30%;
        background-color: #CEE6F3;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -3;
    }
    #selectstonelink{
        margin-top: 5%;
    }
    .selectstonelinktitle h1{
        font-size: 2rem;
    }
    .selectstonelinktitle{
        border: 1px solid;
        margin: 0 7%;
        text-align: center;
        background-color: #fff;
        border-radius: 10px;
    }
    .selectstonelinkmessage h2{
        font-size: 1rem;
        margin: 0 10%;
    }
    .selectstonelinkbutton{
        margin-top: 5%;
        text-align: center;
    }
    .selectstonelinklist {
    display: flex;
    flex-direction: column;
    margin: 0 7%;
    }

    .selectstonelinklist > div {
        display: flex;
        flex-direction: row;
        width: 100%;
        margin-bottom: 2%;
        align-items: center;
    }

    .stone-container {
        flex: 0 0 50%;
        padding: 2%;
    }

    .stoneinfo {
        flex: 1;
        padding-left: 20px; 
        font-size: 1.8rem;
    }
    
</style>