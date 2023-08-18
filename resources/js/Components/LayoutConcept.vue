<template>
    <div id="layoutconcept">
        <div class="layoutconcepttitle">
            <h3>Concept</h3>
            <h1>Layout</h1>
            <h2>流木・石・水草・熱帯魚</h2>
        </div>
        <div class="layoutconceptbackground">
            <div class="layoutconceptbody">
                <h2>水槽に合わせた、快適なレイアウト</h2>
                <h2>お客様の設置する水槽の大きさに合わせて長期維持が容易に行えるように過不足ない提案をいたします。</h2>
                <br>
                <h2>お客様のお部屋にお魚がゆったりと泳ぐ水槽を置きまんか？</h2>
                <img src="/image/sample2.jpg" alt="３８レイアウト水槽">
            </div>
            <div class="layoutconceptbutton">
                <a href="/Layout" class="button9">Make Layout Package</a>
            </div>
        </div>
    </div>
</template>
<style scoped>
    #layoutconcept{
        margin-top: 20vw;
        margin-bottom: -20vw;
    }
    .layoutconcepttitle {
        background-color: #F6F4EB;
        border: 1px solid ;
        width: 70%;
        padding: 2% 0 2% 5%;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
    .layoutconceptbackground{
        border: 1px solid;
        margin: 0 7%;
        padding-top: 20vw;
        position: relative;
        top: -20vw; 
        background-color: #CEE6F3;
    }
    .layoutconceptbackground h2 {
        font-size: 1.2rem;
    }
    .layoutconceptbody img {
        width: 100%;
        height: auto;
    }
    .layoutconceptbutton {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .button9 {
        align-self: flex-end;
        padding: 2% 10%;
        border-radius: 10px;
        background-color: #fff;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        font-weight: 600;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
</style>