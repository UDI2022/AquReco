<template>
    <Header />
    <div id="reccomend">
        <div class="recomendtitle">
            <h3>Recommend</h3>
            <h1>おすすめ</h1>
        </div>
        <div class="recomendimage">
            <img src="/image/sample2.jpg" class="" alt="１４ショップレイアウト１">
            <div class="recomendimagetitle">
                <h2>タイトル</h2>
            </div>
        </div>
        <div class="recomendcomment">
            <h1>ショップからのコメント</h1>
            <div class="recomendcommentbdy">
                <h2>これはテストコメントです。
                    これはテストコメントです。
                    これはテストコメントです。
                    これはテストコメントです。
                    これはテストコメントです。
                    これはテストコメントです。
                    これはテストコメントです。
                    これはテストコメントです。
                    これはテストコメントです。
                </h2>
            </div>
        </div>
        <div class="recomendproducts">
        <div class="recomendproducts2">
            <div class="recomendproduct">
                <h1>水槽</h1>
                <SelectTankLink />
            </div>
            <div class="recomendproduct">
                <h1>流木</h1>
                <SelectWoodLink />
            </div>
            <div class="recomendproduct">
                <h1>石</h1>
                <SelectStoneLink />
            </div>
            <div class="recomendproduct">
                <h1>水草</h1>
                <SelectPlantLink />
            </div>
            <div class="recomendproduct">
                <h1>生体</h1>
                <SelectFishLink />
            </div>
            <div class="recomendproduct">
                <h1>備品</h1>
                <SelectProductLink />
            </div>
        </div>
        </div>
    </div>
    <MakeOrder />
    <ContactLink />
    <Footer /> 
</template>

<style>
.recomendtitle {
    background-color: #F6F4EB;
    border: 1px solid ;
    width: 70%;
    padding: 2% 0 2% 5%;
    position: relative;
    margin-bottom: -3rem;
    z-index: 1;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.recomendtitle h1 {
    font-size: 3rem;
}
.recomendtitle h3 {
    font-size: 1rem;
}
.recomendimage {
    justify-content: center;
    align-items: center;
    border: 1px solid black; 
    border-radius: 0 0 10px 10px;
    width: 70%;
    margin: 0 auto; 
}
.recomendimage img {
    display: block;
    max-width: 100%;
    height: auto; 
}
.recomendimage h2{
    display: block;
    font-size: 2rem;
    text-align: center;
}
.recomendcomment {
    justify-content: center;
    align-items: center;
    border: 1px solid black; 
    border-radius: 10px;
    width: 70%;
    margin: 0 auto; 
}
.recomendcomment h1{
    font-size: 2rem;
    text-align: center;
}
.recomendcomment h2{
    font-size: 1.3rem;
    border: 1px solid;
    border-radius: 0 0 10px 10px;
    margin: 0;
}
.recomendproducts::before{
    content: '';
    position: absolute;
    left: 0vw;
    width: 80vw;
    height: 265vh;
    background-color: #CEE6F3;
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 1;
    z-index: -1;
}
.recomendproducts2::before{
    content: '';
    position: absolute;
    right: 0vw;
    width: 50vw;
    height: 265vh;
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 1;
    z-index: -2;

}

.recomendproduct h1{
    margin-top: 5%;
    border: 1px solid;
    text-align: center;
    font-size: 2rem;
    border-radius: 10px;
    width: 70%;
    background-color: #fff;
}

.recomendproducts .selecttankslinklist .item
{
    margin-top: 0;
}
.recomendproducts #selecttankslink
{
    margin-top: 0;
}

.recomendproducts .selectwoodlinklist .item
{
    margin-top: 0;
}

.recomendproducts #selectwoodlink
{
    margin-top: 0;
}

.recomendproducts .selectstonelinklist .item
{
    margin-top: 0;
}

.recomendproducts #selectstonelink
{
    margin-top: 0;
}

.recomendproducts .selectplantlinklist .item
{
    margin-top: 0;
}

.recomendproducts #selectplantlink
{
    margin-top: 0;
}

.recomendproducts .selectfishlinklist .item
{
    margin-top: 0;
}

.recomendproducts #selectfishlink
{
    margin-top: 0;
}

.recomendproducts .selectproductlinklist .item
{
    margin-top: 0;
}

.recomendproducts #selectproductlink
{
    margin-top: 0;
}

.recomendproducts .selecttankslinktitle
{
    display: none;
}
.recomendproducts .selecttankslinkmessage 
{
    display: none;
}
.recomendproducts .selecttankslinkbutton 
{
    display: none;
} 
.recomendproducts .selectwoodlinktitle 
{
    display: none;
}
.recomendproducts .selectwoodlinkmessage {
    display: none;
}
.recomendproducts .selectwoodlinkbutton{
    display: none;
}
.recomendproducts .selectstonelinktitle {
    display: none;
}
.recomendproducts .selectstonelinkmessage {
    display: none;
}
.recomendproducts .selectstonelinkbutton{
    display: none;
}
.recomendproducts .selectplantlinktitle {
    display: none;
}
.recomendproducts .selectplantlinkmessage {
    display: none;
}
.recomendproducts .selectplantlinkbutton{
    display: none;
}
.recomendproducts .selectfishlinktitle {
    display: none;
}
.recomendproducts .selectfishlinkmessage {
    display: none;
}
.recomendproducts .selectfishlinkbutton{
    display: none;
}
.recomendproducts .selectproductlinktitle  {
    display: none;
}
.recomendproducts .selectproductlinkmessage {
    display: none;
}
.recomendproducts .selectproductlinkbutton
{
    display: none;
}
</style>