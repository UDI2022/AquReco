<template>

    <Header />
    <div id="fishes">
        <div class="fishesbody">
           <ProductsIntroFish />
           <h2>飼育可能な魚類にも沢山の種類がいます。</h2>
           <h2>当店で取り扱っている種類はこちら。</h2>
        </div>
        <FishesCategoryList />
        <Request />
        <ChooseProducts />
        <ContactLink />
        <Footer />
    </div>
</template>
<style>
    #fishes .button6{
        display: none;
    }
    .fishesbody{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    .fishesbody h2{
        font-size: 1.2rem;
        padding: 0 7%;
    }
    .narrow {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    
    .button7 {
        margin-bottom: 2%;
        display: flex;
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