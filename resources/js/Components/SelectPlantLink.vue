<template>
    <div id="selectplantlink">
        <div class="selectplantlinktitle">
            <h1>入れる水草を選択</h1>
        </div>
        <div class="selectplantlinkmessage">
            <h2>水槽のサイズに合わせてご提案。</h2>
            <h2>お魚の行動の邪魔にならないように大きさ・数・形状には注意しましょう。</h2>
        </div>
        <div class="selectplantlinkbutton">
            <a href="/plants" class="button11">水草を選択する</a>
        </div>
        <!--
        <div class="selectplantlinklist">
            <div v-for="(plant) in displayPlantArray" :key="plant.id">
                <div class="plant-container">
                    <img :src="getPlantImageSrc(plant.plant_id)" :alt="plant.imageAltText">
                </div>
            <Favorite_plant :plantId="plant.plant_id" :userEmail="userEmail" @favorite-click="toggleFavorite(plant.plant_id)"/>
                <div class="plantinfo">
                    <div class="plantname">
                        {{ plant.name}}
                    </div>
                    <div class="plantprice">
                        {{ plant.price }}
                    </div>
                    <div class="select-count">
                        <label>個数</label>
                        <select @change="updateSelectedCount(plant.plant_id, $event)">
                            <option value="0">0 個</option>
                            <option v-for="n in Math.floor(localground / plant.ground)" :key="n" :value="n">{{ n }} 個</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</template>

<script>
import axios from "axios";
import Favorite_plant from './Favorite_plant.vue';

export default {
    components: {
        Favorite_plant,
    },
    data() {
        return {
            plantArray: [],
            displayPlantArray: [],
            userEmail: "",
            selectedCount: [],
            localGround: null,
        };
    },
    computed: {
        totalGround() {
            return this.localGround - (this.selectedCount.reduce((acc,item) => acc + item.ground * item.countm, 0));
        }
    },
    props: {
        ground: {
            type: Object,
            default: null
            },
        },
    methods: {
        async fetchPlantData() {
            try {
                const response = await axios.get("/plantdata");
                const plantsData = response.data;
                this.plantArray = plantsData.map(data => {
                    return {
                        plant_id: data.plant_id,
                        name: data.name,
                        fground: data.forground,
                        mground: data.midground,
                        bgorund: data.background,
                        price: data.price,
                        /*Going to add difficulty */
                    };
                });
                this.displayPlantArray = [...this.plantArray];
                console.log("displayPlantArray:", this.displayPlantArray);
            } catch (error) {
                console.error(error);
                this.plantArray = [];
                this.displayPlantArray = [...this.plantArray];
            }
        },
        updateSelectedCount(plantId, event){
            console.log("localGround:", this.localGround);
            const selecedNumber = parseInt(event.target.value);
            const existingItem = this.selectedCount.find(item => item.plant_id === plantId );
            const existingItemgroung = this.plantArray.find(plant => plant.plant_id === plantId);
            if(selectedNumber === 0 && existingItem) {
                const index = this.selectedCount.indexOf(existingItem);
                this.selectedCount.splice(index, 1);
                } else if (existingItem) {
                    existingItem.count = selectedNumber;
                } else {
                    this.selectedCount.push({
                        plant_id: plantId,
                        ground: existingItemgroung.ground,
                        name: existingItemgroung.name,
                        price: existingItemgroung.price,
                        count: selectedNumber,
                    });
                }
            },
        getPlantImageSrc(plant_id){
                return `/image/plant/${plant_id}.jpg`;
            },
    },
    watch: {
        ground(newVal) {
            this.localGround = newVal;
            console.log("☆☆localGround:", this.localGround);
            if(newVal) {
                this.displayPlantArray = this.plantArray.filter(plant => plant.ground <= newVal);
            } else {
                this.displayPlantArray = [...this.plantArray];
            }
        }
    },
    mounted() {
        this.fetchPlantData();
        this.localGround = this.ground;
        console.log("☆☆localGround:", this.localGround);
        
    },
};
</script>

<style>
    #selectplantlink::before{
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
    #selectplantlink {
        margin-top: 5%;
    }
    .selectplantlinktitle h1{
        font-size: 2rem;
    }
    .selectplantlinktitle{
        border: 1px solid;
        margin: 0 7%;
        text-align: center;
        background-color: #fff;
        border-radius: 10px;
    }
    .selectplantlinkmessage h2{
        font-size: 1rem;
        margin: 0 10%;
    }
    .selectplantlinkbutton{
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
    
    .selectplantlinklist .item {
        padding: 1rem;
        margin: 3% 12% 0 12%; 
        border: 1px solid #982176;
        border-radius: 10px;
        box-shadow: 3px 3px 3px 0px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .flex-container {
        display: flex;
        justify-content: space-between;
    }
    p .selectplantlinkname {
        font-size:2rem;
    }
</style>