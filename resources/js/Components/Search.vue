<template>
    <div id="search">
        <h1>一覧から探す</h1>
        <div class="searchimage">
            <!--後ほど、ルート、コントローラーを修正して生体のみを表示するように変更-->
            <img src="/image/sample.jpg" alt="１生体はこちら" href="/ProductList">
            <!--ルート、コントローラを修正して生体のみを表示するように変更-->
            <img src="/image/sample.jpg" alt="２足りない備品はありませんか？" href="/ProductList">
        </div>
        <div class="searchmore">
            <a href="/ProductsList" class="button">See more!</a>
        </div>
    </div>
</template>

<style>

        #search {
            margin-top: 10%;
        }

        #search h1 {
            font-size: 2.5rem;
            text-align: center;
        }

        .searchimage {
            display: flex;
            justify-content: center;
            gap: 5%;
        }
        .searchimage img {
            display: inline-block;
            height: 170px;
            wight: 170px;
        }
        .searchmore {
            margin: 0 10%;
        }
        .searchmore .button {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 10% 0;
            padding: 10px 20px 10px 20px;
            border-radius: 20px;
            background-color: #fff;
            color: #000;
            font-size: 1.5rem;
            border: 1px solid #982176;
            font-weight: 600;
        }


</style>