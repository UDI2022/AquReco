<template>
    <Header />
    <div id="layout">
        <div class="layoutimage">
            <img src="/image/sample2.jpg" alt="３８レイアウト水槽">
        </div>
        <div class="layoutconcepttitle">
            <h3>Concept</h3>
            <h1>Layout</h1>
            <h2>流木・石・水草・熱帯魚</h2>
        </div>
        <div class="layoutconceptmessage">
            <h2>ここで決めるのは、レイアウト素材の草案です。</h2>
            <h2>ご購入前に、ショップ店員と細かい修正をすることで完成します。</h2>
        </div>
    </div>
    <LayoutTankSize @up-wdcost="handleWdcostUpdate" @up-stcost="handleStcostUpdate" @up-ground="handleGroundUpdate" />
    <SelectWoodLink :wdcost="wdcostFromChild" />
    <SelectStoneLink :stcost="stcostFromChild" />
    <SelectPlantLink :ground="groundFromChild"/>
    <SelectFishLink />
    <SelectProductLink />
    <MakeOrder />
    <ContactLink />
    <Footer />

</template>
<script>
    export default {
        data() {
            return {
                wdcostFromChild: null,
                stcostFromChild: null,
                groundFromChild: null
            };
        },
        methods: {
            handleWdcostUpdate(value) {
                this.wdcostFromChild = value;
            },
            handleStcostUpdate(value) {
                this.stcostFromChild = value;
            },
            handleGroundUpdate(value) {
                this.groundFromChild = value;
                // console.log("☆groundFromChild:", this.groundFromChild);
            }
        },
    }
</script>

<style>
.selected {
    background-color: #f0f0f0;
}
.layoutimage {
    display: flex;
    justify-content: center;
    align-items: center;
}
.layoutimage img{
    text-align: center;
}
.layoutconcepttitle {
    background-color: #F6F4EB;
    border: 1px solid ;
    width: 70%;
    padding: 2% 0 2% 5%;
    position: relative;
    z-index: 1;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: -20vw;
}
.layoutconcepttitle h3{
    font-size: 1rem;
    
}
.layoutconcepttitle h1{
    font-size: 3rem;
}
.layoutconcepttitle h2{
    font-size: 1.2rem;
}

</style>