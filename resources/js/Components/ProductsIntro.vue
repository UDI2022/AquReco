<template>
    <div id="productsintro">
        <h1>商品一覧</h1>
        <img src="/image/sample2.jpg" alt="１６商品一覧">
        <h2>水槽には下記のような複数の要素で構成されます。</h2>
        <div class="productsintros">
            <ProductsIntroTank class="productsintrotop"/>
            <ProductsIntroWood class="align-right productsintrotop"/>
            <ProductsIntroStone class="productsintrotop"/>
            <ProductsIntroFish class="align-right productsintrotop"/>
            <ProductsIntroPlant class="productsintrotop"/>
            <ProductsIntroProducts class="align-right productsintrotop"/>
        </div>
    </div>
    <PageTop />
</template>
<style>
#productsintro {
    position: relative; 
}

.productsintros {
    display: flex;
    flex-direction: column;
}

.align-right {
    align-self: flex-end;
}


#productsintro::before {
    content: '';
    position: absolute;
    top: 0%;
    bottom: 0%;
    right: 0vw;
    width: 50vw;
    height: 100%;
    background-color: #CEE6F3;
    z-index: -1;
}
#productsintro h1 {
    font-size: 2rem;
    text-align: center;
}
#productsintro img{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
}
#productintrotable3{
    border: none !important;
}

#productsintro h2 {
    font-size: 1.2rem;
    text-align: center;
    padding: 3% 20%;
}
.productsintros{
    margin-left: 10%;
}
.productsintrotop{
    margin: 5% 0; 
}
.productintrotable1{
    width: 10vw;
    height: 10vw;
    text-align: center;
    font-size: 2rem;
    background-color: #fff;
}
.productintrotable2{
    width: 30vw;
    height: 10vw;
    text-align: center;
    font-size: 2rem;
    background-color: #fff;
}
.productintrotable4 {
    padding-left: 10%;

}
.productintrotable5{
    padding: 5%;
    width: 70vw;
    font-size: 1.2rem;
    background-color: #fff;
}

td, th {
	border: 1px solid #595959;
	border-collapse: collapse;
}

td, th {
	padding: 3px;
	width: 30px;
	height: 25px;
}
th {
	background: #f0e6cc;
}
.button6 {
    display: flex;
    justify-content: center;
    margin: 0 30%;
    padding: 0px 20px;
    border-radius: 10px;
    background-color: #fff;
    color: #000;
    font-size: 1.5rem;
    border: 1px solid #982176;
    box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
}

.even {
	background: #fbf8f0;
}
.odd {
	background: #fefcf9;
}
</style>