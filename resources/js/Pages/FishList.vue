<template>
    <Header />
    <div id="fishlist">
        <div class="fishlistimage">
            <img src="/image/sample2.jpg" alt="３９熱帯魚水槽">
        </div>
        <div class="fishlistconcepttitle">
            <h3>Concept</h3>
            <h1>Fish</h1>
            <h2>群泳・ベタ・日淡・金魚・メダカ</h2>
        </div>
        <div class="fishlistmessage">
            <h2>ここでは、お客様が数移送の主人公に設定するお魚の種類を決めます。</h2>
            <h2>最終的には、お店で状態や模様を見て、店員と相談して決める形となります。</h2>
        </div>
    </div>
    <FishListFIsh />
    <ContactLink />
    <Footer  />
</template>

<style>
.fishlistimage {
    display: flex;
    justify-content: center;
    align-items: center;
}
.fishlistimage img {
    text-align: center;
}
.fishlistconcepttitle {
    background-color: #F6F4EB;
    border: 1px solid ;
    width: 70%;
    padding: 2% 0 2% 5%;
    position: relative;
    z-index: 1;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: -20vw;
}
.fishlistconcepttitle h3{
    font-size: 1rem;
}
.fishlistconcepttitle h1{
    font-size: 3rem;
}
.fishlistconcepttitle h2 {
    font-size: 1.2rem;
}
.fishlistmessage h2{
    margin: 3% 7%;
    font-size: 1.2rem;
}
</style>