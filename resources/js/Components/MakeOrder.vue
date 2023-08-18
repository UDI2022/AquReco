<template>
    <div id="makeorder">
        <div class="makeorderbutton">
            <a href="/Order" class="button12">注文リストを作成する</a>
        </div>
        <div class="makeordermessage">
            <h2>本リストを作成することで「管理番号」を発行できます。</h2>
            <h2>後日、注文リストを見返したり店員に内容を共有し購入前相談に役立てます。</h2>
            <h2>注文リストから「来店告知」を出していただくと店員からお声がけをさせていただけます。</h2>
        </div>
    </div>
</template>
<style>
#makeorder {
    background-color: #CEE6F3;
    margin-top: 3%;
    padding-bottom: 5%;
}
.makeorderbutton{
    margin-top: 5%;
    padding: 5%;
    text-align: center;
}
.button12 {
    justify-content: center;
    margin: 10% 0 0 0;
    padding: 2% 5%;
    border-radius: 10px;
    background-color: #fff;
    color: #000;
    font-size: 2rem;
    border: 1px solid #982176;
    font-weight: 400;
    box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
}
.makeordermessage{
    margin: 3% 7% 0 7%;
}
.makeordermessage h2{
    margin: 0;
    font-size: 1.2rem;
}

</style>