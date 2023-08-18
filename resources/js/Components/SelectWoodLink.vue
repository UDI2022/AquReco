<template>
    <div id="selectwoodlink">
        <div class="selectwoodlinktitle">
            <h1>入れる流木を選択</h1>
        </div>
        <div class="selectwoodlinkmessage">
            <h2>水槽のサイズに合わせてご提案。</h2>
            <h2>お魚の行動の邪魔にならないように大きさ・数・形状には注意しましょう。</h2>
        </div>
        <!--
        <div class="selectwoodlinkbutton">
            <a href="/Woods" class="button11">流木を選択する</a>
        </div>
        -->
        <div class="selectwoodlinklist">
            <div v-for="(wood) in displayWoodArray" :key="wood.id">

            
                <div class="wood-container">
                    <!--img-->
                    <img :src="getWoodImageSrc(wood.wood_id)" :alt="wood.imageAltText">
                </div>
                <Favorite_wood :woodId="wood.wood_id" :userEmail="userEmail" @favorite-click="toggleFavorite(wood.wood_id)"/>
                <div class="woodinfo">
                    <div class="woodname">
                        {{ wood.name}}
                    </div>
                    <div class="woodprice">
                        {{ wood.price }}
                    </div>
                    <div class="select-count">
                        <label>個数</label>
                        <select @change="updateSelectedCount(wood.wood_id, $event)">
                            <option value="0">0 個</option>
                            <option v-for="n in Math.floor(localWdcost / wood.locost)" :key="n" :value="n">{{ n }} 個</option>
                        </select>
                        <!--
                        <div>{{ Math.floor(localWdcost / wood.locost) }}個</div>
                        <div>Debug: localWdcost = {{ localWdcost }}</div>
                        <div>Debug: wood.locost = {{ wood.locost }}</div>
                        <div>Debug: totalWdcost= {{ totalWdcost }}</div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
/**
 * localWdcost 親コンポーネントから受けとったwdcostをそのまま格納
 * wood.locost 各流木が持つコスト
 * totalWdcost コスト計算上で変動する値
 * 
 */
import axios from "axios";
import Favorite_wood from './Favorite_wood.vue';

export default {
    components: {
       Favorite_wood, 
    },
    data() {
        return {
            woodArray: [],
            displayWoodArray: [],
            userEmail: "",
            selectedCount: [],
            localWdcost:null,
        };
    },
    computed: {
        totalWdcost() {
                /**
                 * 1. totalWdcost: This computed property calculates the remaining cost after selecting certain woods.
                 * 2. this.localWdcost: Represents the initial available budget or cost.
                 * 3. this.selectedCount: An array that stores objects with details about the selected woods (their id, name, locost, and the count selected by the user).
                 * 4. reduce: A JavaScript array method that processes each item of an array from left to right and accumulates the result into a single value. 
                 *      - acc (accumulator): Stores the accumulated result, which starts from 0 (as provided as the second argument to the reduce method).
                 *      - item: Represents the current item in the array being processed.
                 * 5. Equation: [localWdcost] - sum of all [item.locost * item.count] for all items in the selectedCount array.
                 */
            return this.localWdcost - (this.selectedCount.reduce((acc, item) => acc + item.locost * item.count, 0));
        }
    },
    props: {
        wdcost: {
            type: Number,
            default: null
            },
        },

    methods: {
        /**
         * fetfchWoodData():just row data about wood
        */
        async fetchWoodData() {
            try {
                const response = await axios.get("/wooddata");
                const woodsData = response.data;

                this.woodArray = woodsData.map(data => {
                        return {
                            wood_id: data.wood_id,
                            size: data.size,
                            upper: data.upper,
                            lower: data.lower,
                            locost: data.layoutcost,
                            name: data.name,
                            price: data.price,
                        };
                    });
                    this.displayWoodArray = [...this.woodArray];     
                } catch (error) {
                    console.error(error);
                    this.woodArray = [];
                    this.displayWoodArray = [...this.woodArray];
                }
        },


        /**
         * ☆Check the "selectedNumber" and the corresponding "existingItem" in the already selected "selectedCount".
         * 1.The "selecedNumber" is 0 and the existingItem is already in the list:
         *  ->The selected quantity is removed from the list.
         * 2.If the "selectedNumber" is non-zero and the "wood_Id"is already in the list.
         *  ->Update the "selectedNumber".
         * 3.The "wood_Id" isn't in the list.
         *  ->Add new piece information to the list.
         * 
        */
        updateSelectedCount(woodId, event){
            console.log("localWdcost:", this.localWdcost);
            /*parseInt():Parses the first number in a string and converts it to an integer
            * selectedNumber: Analuze the value returned as a result of the action as an integer in response to an action by the user 
            */
            const selectedNumber = parseInt(event.target.value);
            /**
             * find():A way to search through an array. It looks at each item in the array,one by one, until it finds an item that matches certain condition.
             *        Once it finds that item, it stops and gives that item back true.
             *        If it doesn`t find any item that matches the condition, itgives back 'undefined'
             * item=>item.wood_id: Executed for each "item" in the array "this.selectedCount"
             *                     Tests if each "item.wood_id" is equal to "woodId"
             *☆Finally,search "this.selectedCount" for an item with a "wood_id" property2 that matches "woodld" and assign that item to "existingItem"
            */
            const existingItem = this.selectedCount.find(item => item.wood_id === woodId );
            
            const existingItemCost = this.woodArray.find(wood => wood.wood_id === woodId);
            
            /*
            *if (selectedNumber === 0 && existingItem)
            *   1.selectedNumber === 0 : Checks if "selectedNumber" is 0
            *   2.existingItem : checking for the existence if "existingitem"
            * If the two conditions are coth "true", the contents of the if statement are executed
            */
            if (selectedNumber === 0 && existingItem) {
                /*
                *This searches for the location of "existingItem" in "this.selectedCount".
                *If found, returns its index to "index".
                *If not found, returns "-1" to "index".
                */
                const index = this.selectedCount.indexOf(existingItem);
                /**
                 * splice(): This method is used to remove,add or replace elements from an array
                 * To try "existingItem" is removed from "this.selectedCount"
                */
                this.selectedCount.splice(index, 1);
                    /*
                    *If existingItem exists, this condition is "true" and contents of the else id statement are executed.
                    *※If imformation on already selected "wood" exists in "this.selectedCount"
                    */
                } else if (existingItem) {
                    /**
                     * Update the value of the count property of an existing "existingItem" to "selectedNumber", the number of selections made.
                    */
                    existingItem.count = selectedNumber;
                } else {
                    /**
                     * Add new data to "selectedCount"
                    */
                    this.selectedCount.push({
                        wood_id: woodId,
                        locost: existingItemCost.locost,
                        name: existingItemCost.name,
                        price: existingItemCost.price,
                        count: selectedNumber,
                    });
                }
        },
        getWoodImageSrc(wood_id){
            return `/image/wood/${wood_id}.jpg`;
        },
    },
    /*It watches for changes incertain data propertoes and performs actions in response*/
    watch: {
        wdcost(newVal) {
            this.localWdcost = newVal;
            /**
             * If "newVal" is present(not 0,null, or underfined)
            */
            if (newVal) {
                /**
                 * It assign to "displayWoodArray"only those items from "woodArray" where "locost" is less than ot equal to "newVal"
                */
                this.displayWoodArray = this.woodArray.filter(wood => wood.locost <= newVal);
            /**
             * IF "newVal" is not present (0, null, or uunderfined)
            */
            } else {
                /**
                 * It simply copies the cntent of "woodArray" to "displayWoodArray"
                */
                this.displayWoodArray = [...this.woodArray];
            }
            }
        },
    mounted() {
        this.fetchWoodData();
    },

};
</script>
<style>
    #selectwoodlink::before{
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
    .selectwoodlinktitle h1{
        font-size: 2rem;
    }
    .selectwoodlinktitle{
        border: 1px solid;
        margin: 0 7%;
        text-align: center;
        background-color: #fff;
        border-radius: 10px;
    }
    .selectwoodlinkmessage h2{
        font-size: 1rem;
        margin: 0 10%;
    }
    .selectwoodlinkbutton{
        margin-top: 5%;
        text-align: center;
    }
    .selectwoodlinklist {
    display: flex;
    flex-direction: column;
    margin: 0 7%;
    }

    .selectwoodlinklist > div {
        display: flex;
        flex-direction: row;
        width: 100%;
        margin-bottom: 2%;
        align-items: center;
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