<template>
    <div id="fishconcept">
        <div class="fishconcepttitle">
            <h3>Concept</h3>
            <h1>Fishes</h1>
            <h2>群泳・ベタ・日淡・金魚・メダカ</h2>
        </div>
        <div class="fishconceptbackground">
            <div class="fishconceptbody">
                <h2>お魚が泳ぐスペースを広く確保することで美しく群泳するレイアウトをご提案。</h2>
                <br>
                <h2>また、一部混泳が難しいお魚やレイアウトの維持が難しいお魚もコチラでご提案。</h2>
                <img src="/image/sample2.jpg" alt="３９熱帯魚水槽">
            </div>
            <div class="fishconceptbutton">
                <a href="/FishList" class="button10"> Make Fish Package</a>
            </div>
        </div>
    </div>
</template>
<style>
    #fishconcept{
        margin-bottom: -20vw;
    }
    .fishconcepttitle {
        background-color: #F6F4EB;
        border: 1px solid ;
        width: 70%;
        padding: 2% 0 2% 5%;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-left: auto;
    }
    .fishconcepttitle h3{
        font-size: 1rem;
        
    }
    .fishconcepttitle h1{
        font-size: 3rem;
    }
    .fishconcepttitle h2{
        font-size: 1.2rem;
    }
    .fishconceptbackground{
        border: 1px solid;
        margin: 0 7%;
        padding-top: 20vw;
        position: relative;
        top: -20vw; 
        background-color: #CEE6F3;
    }
    .fishconceptbackground h2 {
        font-size: 1.2rem;
    }
    .fishconceptbody img {
        width: 100%;
        height: auto;
    }
    .fishconceptbutton {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .button10 {
        align-self: flex-start;
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
