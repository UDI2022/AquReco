<template>
    <div class="layouttanksize">
        <div class="layouttanksizetitle">
            <h1>水槽の大きさを選択</h1>
        </div>
        <div class="layouttanksizemessage">
            <h2>お客様の水槽を置ける場所の大きさ、総重量をもとにお考え下さい。</h2>
        </div>
        <div class="layouttanksizeform">
            <div v-for="(tank) in tankSize" :key="tank.size"
            @click="selectOption(tank.size)"
            :class="[selectedSize === tank.size ? 'selected' : 'notSelected', 'layouttanksizeforms']">
                <div class="ltsftitele">{{ tank.sizedetail }}の水槽</div>
                
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        data() {
            return {
                tankSize: [],
                selectedSize: [],
                selectTankStatus: [],
            };
        },
        methods: {
            async fetchTankSizeData(){
                try {
                    const response = await axios.get("/tanksizedata");
                    const tankSizeData = response.data;

                    this.tankSize = tankSizeData.map(data => {
                        return {
                            sizedetail: data.sizedetail,
                            size: data.id,
                            stcost: data.stonecost,
                            wdcost: data.woodcost,
                            fscost: data.fishcost,
                            fground: data.forground,
                            mground: data.midground,
                            bground: data.background,
                        };
                    });
                    console.log("tankSize:", this.tankSize);                    
                } catch (error) {
                    console.error(error);
                    this.tankSize = [];
                }
            },
            selectOption(size) {
                this.selectedSize = size;
                console.log('selectedsize:', this.selectedSize);
                console.log('selectTankStatus:', this.selectTankStatus);

                this.selectTankStatus.splice(0, this.selectTankStatus.length);

                const selectedTank = this.tankSize.find(tank => tank.size === size);
                if (selectedTank) {
                    this.selectTankStatus.push({
                        stcost: selectedTank.stcost,
                        wdcost: selectedTank.wdcost,
                        fscost: selectedTank.fscost,
                        fground: selectedTank.fground,
                        mground: selectedTank.mground,
                        bground: selectedTank.bground,
                    });
                    this.$emit('up-wdcost', this.selectTankStatus[0].wdcost);
                    this.$emit('up-stcost', this.selectTankStatus[0].stcost);
                    this.$emit('up-ground', {
                        fground: this.selectTankStatus[0].fground,
                        mground: this.selectTankStatus[0].mground,
                        bground: this.selectTankStatus[0].bground
                    })
                }

            },
        },
        mounted() {
            this.fetchTankSizeData();
            },


    };
</script>

<style>
    .layouttanksize::before {
        content: '';
        position: absolute;
        right: 0vw;
        width: 50vw;
        height: 84%;
        background-color: #CEE6F3;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -1;
    }
    .layouttanksizetitle h1{
        font-size: 2rem;
        border: 1px solid;
        width: 80%;
        text-align: center;
        background-color: #fff;
    }
    .layouttanksizemessage h2{
        font-size: 1.5rem;
    }

    .selected {
        background-color: #f0f0f0;
        box-shadow: inset 3px 3px 3px 0px rgba(0, 0, 0, 0.2);
    }
    .notSelected {
        background-color: #fff;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
    .layouttanksizeforms {
        padding: 1% 7%;
        border-radius: 20px;
        margin: 3% 10%;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        transition: box-shadow 0.3s ease, background-color 0.3s ease;
    }
    .layouttanksizeforms .ltsftitele {
        font-size: 2rem;
    }
    .layouttanksizeforms .ltsfinfo {
        font-size: 1.2rem;
        text-align: right;
        
    }
</style>
