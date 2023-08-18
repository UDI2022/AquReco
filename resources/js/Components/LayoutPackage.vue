<template>
    <div id="layoutpackage">
        <div class="layoutbackground">
            <h1>Layout Package</h1>
            <div class="layoutimg">
                <img src="/image/sample2.jpg" alt="６レイアアウト志向">
            </div>
            <div class="layoutmessage">
                <h2>水槽にあった素材を提案</h2>
                <h2>時間が経っても崩れにくい</h2>
                <h2>水草の潤いをお届け</h2>
            </div>
            <div class="layoutbutton">
                <a href="/Layout" class="button3">Make Layout Package</a>
            </div>
        </div>
    </div>
</template>

<style>
    #layoutpackage {
        positon: relative;
    }
    #layoutpackage::before {
        content: '';
        position: absolute;
        left: 0vw;
        width: 70vw;
        height: 65%;
        background-color: #CEE6F3;
        background-img: url('/image/sample2.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -1;
    }

    #layoutpackage h1{
        margin: 0 3%;
        font-size: 2rem;
        width: 80%;
    }
    .layoutimg {
        height: 180px;
        display: flex;
        justify-content: flex-end;
       }
    .layoutimg img {
        height: 100%;
    }
    .layoutmessage h2{
        font-size: 1.3rem;
        margin: 3% 0 1% 3%;
    }
    .layoutbutton {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 5%;
    }
    .button3 {
        align-self: flex-start;
        justify-content: center;
        left: 0;
        /*margin: 10% 0 0 0;*/
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