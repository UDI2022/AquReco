<template>
    <div id="fishpackage">
        <div class="fishpackagebackground">
            <h1>Fish Package</h1>
            <div class="fishpackageimg">
                <img src="/image/sample2.jpg" alt="７生体志向">
            </div>
            <div class="fishpackagemessage">
                <h2>水槽にあった素材を提案</h2>
                <h2>時間が経っても崩れにくい</h2>
                <h2>水草の潤いをお届け</h2>
            </div>
            <div class="fishpackagebutton">
                <a href="/FishList" class="button4">Make Fish Package</a>
            </div>
        </div>
    </div>
</template>

<style>
    #fishpackage {
        positon: relative;
    }
    #fishpackage::before {
        content: '';
        position: absolute;
        right: 0vw;
        width: 70vw;
        height: 65%;
        background-color: #CEE6F3;
        background-img: url('/image/sample2.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -1;
    }

    #fishpackage h1{
        margin: 0 3%;
        font-size: 2rem;
        text-align: right;
    }
    .fishpackageimg {
        height: 180px;
        display: flex;
        justify-content: flex-start;
       }
    .fishpackageimg img {
        height: 100%;
    }
    .fishpackagemessage h2{
        font-size: 1.3rem;
        margin: 3% 3% 1% 3%;
        text-align: right;
    }
    .fishpackagebutton {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        margin:5% 0;
    }
    .button4 {
        align-self: flex-end;
        justify-content: center;
        /*margin: 10% 0 0 0;*/
        padding: 2% 13%;
        border-radius: 10px;
        background-color: #fff;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        font-weight: 600;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }


</style>