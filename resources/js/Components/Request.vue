<template>
    <div class="request">
        <div class="request1">
            <h1>当店からのお願い</h1>
            <h2>飼った生き物は絶対に逃がさないで！</h2>
        </div>
    
        <div class="coutions">
            <h2>生き物の放流にはリスクがいっぱい</h2>
            <div class="coution">
                <div class="countion1">
                    <h3>1．法律違反として罰せられる</h3>
                        <div class="countion1-info">
                            <img src="/image/sample.jpg" alt="３法律違反として罰せられる">
                            <h4>特定外来生物など外来生物法に従い懲役または罰金に課せられる可能性</h4>
                        </div>
                </div>
                <div class="countion2">
                    <h3>２．改良品種は自然で生きていけないものも</h3>
                        <div class="coution2-info">
                            <h4>暖かい国で生息する熱帯魚は冬を越せない。鑑賞に撮っ伽した金魚やメダカも外敵に見つかりやすく生きていけない。</h4>
                            <img src="/image/sample.jpg" alt="４改良品種は自然では生きていけない">
                        </div>

                </div>
                <div class="coution3">
                    <h3>３．日本・地域の環境破壊のリスク</h3>
                        <div class="coution3-info">
                            <img src="/image/sample.jpg" alt="５日本・地域の環境破壊のリスク">
                            <h4>在来種を捕食してしまったり餌の競合をする可能性が高い。また、在来種との交雑による種の存続の危機を引き起こす事象や遺伝子攪乱のリスクも高い。</h4>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    @media(max-width: 600px){
        .request {
            margin: 10% 5% 0 5%;
        }
        .request img{
            height: 170px;
            wight: 170px;
        }
        .request1 h1{
            font-size: 2.5rem;
            text-align: center;
        }
        .request1 h2{
            font-size: 1.2rem;
            text-align: center;
        }
        .coutions {
            margin-top: 5%;
            font-size: 6vw;
            text-align: center;
        }
        .countion1 h3{
            margin-top: 3%;
            font-size: 5vw;
        }
        .countion1-info{
            display: flex;
        }
        .countion1-info h4{
            margin: 4%;
            text-align: left;
            align-items: center;
            font-size: 5vw;
        }
        .countion2 h3{
            margin-top: 3%;
            font-size: 5vw;
        }
        .coution2-info{
            display: flex;
        }
        .coution2-info h4{
            margin: 4%;
            text-align: left;
            align-items: center;
            font-size: 4.5vw;
        }
        .countion3 h3{
            margin-top: 3%;
            font-size: 5vw;
        }
        .coution3-info{
            display: flex;
        }
        .coution3-info h4{
            margin: 3%;
            text-align: left;
            align-items: center;
            font-size: 4vw;
        }
    }
</style>