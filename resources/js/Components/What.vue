<template>
    <div id="whatis">
        <div class="whattitle">
            <h1>What is AQ-RECO?</h1>
        </div>
        <div class="whatconcept">
            <h2>お客様のコンセプトから</h2>
            <h2>簡単にレイアウトを構築できる</h2>
            <h2>あなただけの商品パックをご提案</h2>
        </div>
        <div class="whatmigrate">
            <a href="/Login" class="whatbutton">Log In</a>
            <a href="/register" class="whatbutton">Try me！</a>
        </div>
        <div class="whatnotice">
            <h3>※当サイトで紹介される商品は店頭でお取り扱いのある商品の一部です。追加のご要望など、ご相談は店頭で承っております。</h3>
        </div>
    </div>
</template>

<style>

        #whatis {
            /*background-color: #91C8E4; */
        }
        .whattitle h1 {
            font-size: 2.5rem;
            text-align: center;
        }
        .whatconcept {
            margin: 0 10%;

            background-color: #F6F4EB;
        }
        .whatconcept h2 {
            font-size: 6vw;
            font-weight: 300;
            text-align: center;
        }
        .whatmigrate {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .whatbutton {
            display: inline-block;
            margin: 10px 0px;
            padding: 0px 20px;
            border-radius: 10px;
            background-color: #fff;
            color: #000;
            font-size: 1rem;
            border: 1px solid #982176;
            box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
        }
        .whatnotice {
            margin: 10px 10%;
            font-size: 0.7rem;
            font-weight: 400;
        }



</style>