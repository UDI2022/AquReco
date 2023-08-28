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
            localGround: 0,
        };
    },
    computed: {
        totalGround() {
            return this.localGround - (this.selectedCount.reduce((acc,item) => acc + item.ground * item.count, 0));
        },
        /* displayPlantArrayF:fround is not null 
         * ->There is value in fground :Array of forground plants
        */
        displayPlantArrayF() {
            return this.plantArray.filter(plant => plant.fground !== null);
        },
        /**displayPlantArrayM: mground is not null
         * ->There is a value in mground: Array of midground plants.
         */
        displayPlantArrayM() {
            return this.plantArray.filter(plant => plant.mground !== null);
        },
        /**displayPlantArrayB: bground is not null
         * ->There is a value in bground: Array of background plants.
         */
        displayPlantArrayB() {
            return this.plantArray.filter(plant => plant.bground != null);
        },
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
                    /*
                    console.log("plant fground:", data.forground);
                    console.log("plant mground:", data.midground);
                    console.log("plant bground:", data.background);
                    */
                    return {
                        plant_id: data.plant_id,
                        name: data.name,
                        fground: data.forground,
                        mground: data.midground,
                        bground: data.background,
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
            const selectedNumber = parseInt(event.target.value);
            const existingItem = this.selectedCount.find(item => item.plant_id === plantId );
            const existingItemground = this.plantArray.find(plant => plant.plant_id === plantId);
            if(selectedNumber === 0 && existingItem) {
                const index = this.selectedCount.indexOf(existingItem);
                this.selectedCount.splice(index, 1);
                } else if (existingItem) {
                    existingItem.count = selectedNumber;
                } else {
                    this.selectedCount.push({
                        plant_id: plantId,
                        ground: existingItemground.ground,
                        name: existingItemground.name,
                        price: existingItemground.price,
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
    },
};
</script>

<template>
    <div id="selectplantlink">
        <div class="selectplantlinktitle">
            <h1>入れる水草を選択</h1>
        </div>
        <div class="selectplantlinkmessage">
            <h2>水槽のサイズに合わせてご提案。</h2>
            <h2>お魚の行動の邪魔にならないように大きさ・数・形状には注意しましょう。</h2>
        </div>
        <!--
        <div class="selectplantlinkbutton">
            <a href="/plants" class="button11">水草を選択する</a>
        </div>
        -->
        <!-- Forground plants section-->
        <div class="selectplantlinklist">
            <h3>Forground Plants</h3>
            <div v-for ="(plant) in displayPlantArrayF" :key="plant.id" class="item">
                <div class="plant-container">
                    <img :src="getPlantImageSrc(plant.plant_id)" :alt="plant.imageAltText">
                </div>
            <Favorite_plant :plantId="plant.plant_id" :userEmail="userEmail" @Favorite-click="toggleFavorite(plant.plant_id)"/>
                <div class="plantinfo">
                    <div class="plantinfo">
                        <div class="plantname">
                            {{ plant.name }}
                        </div>
                        <div class="select-count">
                            <label>個数</label>
                            <select @change="updateSelectedCount(plant.plant_id, $event)">
                                <option value="0">0個</option>
                                <option v-for="n in (localGround.fground ? (isNaN(localGround.fground / plant.fground) ? 0 : Math.floor(localGround.fground / plant.fground)) : 0)" :key="n" :value="n">{{ n }}個</option>
                            </select>
                        </div>
                        <p>plant.fground: {{ plant.fground }}</p>
                    </div>
                </div>
            </div>
            <h3>Midlleground Plants</h3>
            <div v-for ="(plant) in displayPlantArrayM" :key="plant.id" class="item">
                <div class="plant-container">
                    <img :src="getPlantImageSrc(plant.plant_id)" :alt="plant.imageAltText">
                </div>
            <Favorite_plant :plantId="plant.plant_id" :userEmail="userEmail" @Favorite-click="toggleFavorite(plant.plant_id)"/>
                <div class="plantinfo">
                    <div class="plantinfo">
                        <div class="plantname">
                            {{ plant.name }}
                        </div>
                        <div class="select-count">
                            <label>個数</label>
                            <select @change="updateSelectedCount(plant.plant_id, $event)">
                                <option value="0">0個</option>
                                <option v-for="n in (localGround.mground ? (isNaN(localGround.mground / plant.mground) ? 0 : Math.floor(localGround.mground / plant.mground)) : 0)" :key="n" :value="n">{{ n }}個</option>
                            </select>
                        </div>
                        <p>plant.mground: {{ plant.mground }}</p>
                    </div>
                </div>
            </div>
            <h3>Background Plants</h3>
            <div v-for ="(plant) in displayPlantArrayB" :key="plant.id" class="item">
                <div class="plant-container">
                    <img :src="getPlantImageSrc(plant.plant_id)" :alt="plant.imageAltText">
                </div>
            <Favorite_plant :plantId="plant.plant_id" :userEmail="userEmail" @Favorite-click="toggleFavorite(plant.plant_id)"/>
                <div class="plantinfo">
                    <div class="plantinfo">
                        <div class="plantname">
                            {{ plant.name }}
                        </div>
                        <div class="select-count">
                            <label>個数</label>
                            <select @change="updateSelectedCount(plant.plant_id, $event)">
                                <option value="0">0個</option>
                                <option v-for="n in (localGround.bground ? (isNaN(localGround.bground / plant.bground) ? 0 : Math.floor(localGround.bground / plant.bground)) : 0)" :key="n" :value="n">{{ n }}個</option>
                            </select>
                        </div>
                        <p>plant.bground: {{ plant.bground }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<style>
    #selectplantlink::before {
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
    .selectplantlinklist{
        display: flex;
        flex-direction: column;
        margin: 0 7%;
    }
    .selectplantlinklist > div {
        display: flex;
        flex-direction: row;
        width: 100%;
        margin-bottom:2%;
        align-items: center;
    }
    .selectplantlinklist h3 {
        font-size: 2rem;
        font-weight: 800;
        text-align: center;
    }
    .plant-container {
        flex: 0 0 50%;
        padding: 2%;
    }
    .plantinfo {
        flex: 1;
        padding-left: 20px;
        font-size: 1.8rem;
    }

</style>