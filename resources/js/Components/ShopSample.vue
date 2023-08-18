<template>
    <div id="shopsample">
        <div class="sampletitle">
            <h1>お店の見本レイアウト</h1>
        </div>
        <div class="samplemassage">
            <h2>制作は簡単ではありませんが</h2>
            <h2>イメージを膨らませてみましょう</h2>
        </div>
        <div class="sampleimg1">
            <!--一意の管理番号と紐づけて商品が表示されるようにしておく-->
            <a class="sampleimg1link" href="/Recommend">
            <img src="/image/sample2.jpg" class="" alt="１４ショップレイアウト１">
            </a>
        </div>
        <div class="sampleshop1">
            <h2>〇〇店 ■■■■レイアウト</h2>
        </div>
        <div class="sampleimg2">
            <a class="sampleimg1link" href="/Recommend">
            <img src="/image/sample2.jpg" class="" alt="１５ショップレイアウト２">
            </a>
        </div>
        <div class="sampleshop2">
            <h2>〇〇店 ■■■■レイアウト</h2>
        </div>
    </div>
</template>
<style>
    #shopsample{
        margin: 7% 0;
    }
    #shopsample::before {
        content: '';
        position: absolute;
        left: 0vw;
        width: 50vw;
        height: 93%;
        background-color: #CEE6F3;
        background-img: url('/image/sample2.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -1;
    }
    .sampletitle h1 {
        font-size: 2rem;
        text-align: center;
    }
    .samplemassage h2 {
        font-size:4vw;
        font-weight: 300;
        text-align: center;
    }
    .samplemassage{
        margin: 3% 0;
    }
    .sampleimg1{
        display: flex;
        justify-content: flex-start;
    }
    .sampleshop1 h2 {
        display: flex;
        justify-content: flex-start;
        margin-left: 5%;
        font-size: 1.5rem;
    }
    .sampleimg2 {
        height: 180px;
        display: flex;
        justify-content: end;
    }
    .sampleshop2 h2 {
        display: flex;
        justify-content: flex-end;
        margin-right: 5%;
        font-size: 1.5rem;
    }
</style>