<template>
    <div class="fishlistfish">
        <div class="fishlistfishtitle">
            <h1>お魚の種類</h1>
        </div>
        <div class="fishlistfishmessage">
            <h2>こちらでは、混泳に向かない種類の飼育や群泳が見られるレイアウトを紹介しています。</h2>
        </div>
        <div class="fishlistfishbuttons">
            <div class="fishlistfishbutton1">
                <FIshListFishButton0 />
            </div>
            <div class="fishlistfishbutton2">
                <FIshListFishButton1 />
                <FIshListFishButton2 />
                <FIshListFishButton3 />
                <FIshListFishButton4 />
            </div>
        </div>
    </div>
</template>

<script>
    
</script>

<style>
    .fishlistfishbutton1::before {
        content: '';
        position: absolute;
        left: 0vw;
        width: 70vw;
        height: 26vw;
        background-color: #CEE6F3;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -1;
    }
    .fishlistfishbutton2::before {
        content: '';
        position: absolute;
        right: 0vw;
        width: 70vw;
        height: 138vw;
        background-color: #CEE6F3;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -1;
    }

    .fishlistfishtitle h1{
        font-size: 2rem;
        border: 1px solid;
        width: 80%;
        text-align: center;
        background-color: #fff;       
    }
    .fishlistfishtitle  h2{
        font-size: 1.5rem;
    }
    .fishlistfishmessage{
        margin: 3% 7%;
        font-size: 1.2rem;
    }

</style>
