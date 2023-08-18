<template>
<div class="productsintroprduct productsintroall">
                <table>
                    <tbody>
                        <tr>
                            <td class="productintrotable1">６</td>
                            <td class="productintrotable2" colspan="2">資材</td>
                            <td id="productintrotable3"></td>
                        </tr>
                        <tr>
                            <td id="productintrotable3"></td>
                            <td class="productintrotable5" colspan="3">
                                <h3>ここまで決めてきた環境を維持するために導入します。</h3>
                                <h3>その内容は多岐にわたります。</h3>
                                <h3>お客様の経験やご予算に合わせて決定しましょう。</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="/Products" class="button6">資材を見る</a>
            </div>
</template>
<style>
#productsintro {
    position: relative; 
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
.productsintrostone{

}
.productsintros{
    margin-left: 10%;
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
	border-collapse: separate;
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