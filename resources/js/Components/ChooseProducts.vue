<template>
    <div id="chooseproducts">
        <h1>商品を選ぶ</h1>
        <h2>お気に入りの商品を探そう</h2>
        <div class="chooseproductslist">
            <div class="grid">
                <div class="cell"></div>
                <div class="cell">
                    <a href="/Tanks" class="buttonl">Tanks</a>
                </div>
                <div class="cell">
                    <img src="/image/tank8.jpg" alt="８水槽">
                </div>
                <div class="cell">
                    <img src="/image/wood9.jpg" alt="９流木">
                </div>
                <div class="cell">
                    <a href="/Woods" class="buttonr">Woods</a>
                </div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell">
                    <a href="/Stones" class="buttonl">Stones</a>
                </div>
                <div class="cell">
                    <img src="/image/stone10.jpg" alt="１０石">
                </div>
                <div class="cell">
                    <img src="/image/plant11.jpg" alt="１１水草">
                </div>
                <div class="cell">
                    <a href="/Plants" class="buttonr">Plants</a>
                </div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell">
                    <a href="/Fishes" class="buttonl">Fishes</a>
                </div>
                <div class="cell">
                    <img src="/image/fish12.jpg" alt="１２生体">
                </div>
                <div class="cell">
                    <img src="/image/products13.jpg" alt="１３備品">
                </div>
                <div class="cell">
                    <a href="/Products" class="buttonr">Others</a>
                </div>
                <div class="cell"></div>
            </div>            
        </div>

    </div>
</template>

<style>
    #chooseproducts h1{
        font-size: 2.5rem;
        text-align:center;
        font-weight: 400;

    }
    #chooseproducts h2{
        font-size: 1.2rem;
        text-align:center;
        font-weight: 300;
    }
    #chooseproducts {
        background-color: #e0ffff;
        padding-bottom: 5%;
    }
    .grid {
        display: grid;
        grid-template-columns: 45% 10% 45%;
        grid-template-rows: repeat(5, 170px);
        gap: 0;
    }

    .cell {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .cell img {
        width: auto;
        height: 50vw;
        border-radius: 10%;
}
    

    .cell .buttonl {
        position: absolute;
        top: 50%; /* Position at the vertical middle */
        transform: translateY(-50%); /* Shift up by half of its own height */
        width: 150px;
        height: 66px;
        text-align: center;
        line-height: 66px;
        background-color: #ccc;
        z-index: 1;
    }


    .cell .buttonr {
        position: absolute;
        top: 50%; /* Position at the vertical middle */
        transform: translateY(-50%); /* Shift up by half of its own height */
        width: 150px;
        height: 66px;
        text-align: center;
        line-height: 66px;
        background-color: #ccc;
    }

    .cell .buttonl, .cell .buttonr {
        border-radius: 10px;
        background-color: #fff;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        font-weight: 600;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
    /* 2nd, 5th, 8th and 11th buttons overflows to the right */
    .cell:nth-child(3n + 2) .buttonr {
        right: 0;
    }

    /* 4th, 7th and 10th buttons overflows to the left */
    .cell:nth-child(3n) .buttonl {
        left: 0;
    }
</style>