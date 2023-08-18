<template>
    <div id="alreadypackage">
        <div class="alreadytitle">
            <h1>既にパッケージ作成済みの方</h1>
        </div>
        <div class="showalreadypackage">
            <!--OrderlistからログインのIDをもとに一覧で表示する-->
            <h2>発行済リストを見る</h2>
        </div>

            <h3>ユーザー登録済の方は過去の分を閲覧できます。</h3>

        <div class="showalreadypackagelink">
            <a href="/ExistingList"><i class="fa-solid fa-clipboard"></i> 発行済リストはコチラ</a>
        </div>
        <div class="callalreadypackage">
            <h2>管理番号から呼び出す</h2>
        </div>
        <div class="showalreadypackagemessage">
            <h3>事前に発行された管理番号からパッケージを呼び出すことができます。</h3>
        </div>
        <div class="callalreadypackageform">
            <h2>管理番号</h2>
            <form @submit.prevent="submit" class="form-container">                    <input type="text" placeholder="Input number" class="form-input">
            </form>
                <a href="/FishList" class="button5">表示</a> 
        </div>        
    </div>
</template>
<style>
    #alreadypackage::before {
        content: '';
        position: absolute;
        right: 0vw;
        width: 50vw;
        height: 90%;
        background-color: #CEE6F3;
        z-index: -1;
    }
    .alreadytitle h1{
        font-size: 2.4rem;
        text-align: center;
    }
    .showalreadypackage {
        /*background-color: #F6F4EB;*/
        margin-right: 20%;
        padding: 3% 3% 3% 15%;
    }
    .showalreadypackage h2{
        font-size: 1.5rem;background-color: #F6F4EB;
        border: 1px solid ;
        padding: 2% 5% 2% 5%;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }
    #alreadypackage h3{
        font-size: 1.2rem;
    }
    .showalreadypackagelink {
        font-size: 1.6rem;
        font-weight: 400;
        text-align: center;
        margin: 3% 0;
    }
    .callalreadypackage {
        background-color: #F6F4EB;
        margin-left: 20%;
        padding: 3% 25% 3% 3%;
    }
    .callalreadypackage h2 {
        font-size: 1.5rem;
    }
    .showalreadypackagemessage h3 {
        margin-left: 20%;
        font-size: 1rem;
    }
    .callalreadypackageform h2{
        margin-left: 20%;
        font-size: 1.5rem;
    }
    .form-container {
        width: 70%; 
        margin: 0 auto 0 20%; 
    }
    
    .form-input {
        width: 100%;  
    }
    .button5 {
        display: flex;
        justify-content: center;
        margin: 10% 20%;
        padding: 10px 20px 10px 20px;
        border-radius: 20px;
        background-color: #fff;
        color: #000;
        font-size: 1.5rem;
        border: 1px solid #982176;
        font-weight: 600;
        box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
    </style>