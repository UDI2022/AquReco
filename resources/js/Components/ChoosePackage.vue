<template>
    <div id ="choosepackage">
        <h1>商品パッケージを作成する</h1>
        <div class="chooseimg">
            <img src="/image/Layout8.jpg" class="img-circle-left" alt="６レイアアウト志向" href="/Layout">
            <img src="/image/Fishlist9.jpg" class="img-circle-right" alt="７生体志向" href="/FishList">
        </div>
        <div class="choosemessage">
            <h2>お客様のイメージに合わせて商品を提供いたします。</h2>
        </div>
    </div>
        <div class="chooselink">
            <a href="/Layout" class="button1">Layout Package</a>
        </div>
        <div class="chooselink">    
            <a href="/FishList" class="button2">Fish Package</a>
        </div>

</template>


<style scoped>
    #choosepackage h1 {
        font-size: 2rem;
        font-weight: 400;
        text-align: center;
    }
    #choosepackage {
        margin: 0 7%;
    }
    .chooseimg {
        display: grid;
        grid-template-columns: 1fr 1fr;
        justify-items: center;
    }

    .chooseimg img{
        height: 245px;
        margin: 5% 0;
    }
    .img-circle-left {
        clip-path: circle(50% at 100% 50%);
        object-fit: cover;
    }
    .img-circle-right {
        clip-path: circle(50% at 0% 50%);
        object-fit: cover;
    }
    .choosemessage h2{
        font-size: 1.4rem;
    }
    .chooselink {

    }
    .button1 {
        width: 70%;
        display: flex;
        align-self: flex-start;
        justify-content: center;
        left: 0;
        margin-right: auto;
        padding: 2% 10%;
        border-radius: 10px;
        background-color: #fff;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        font-weight: 600;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
    .button2 {
        width: 70%;
        display: flex;
        align-self: flex-end;
        justify-content: center;
        right: 0;
        margin-left: auto;
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
