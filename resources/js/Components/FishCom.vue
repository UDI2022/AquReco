<template>
    <div class="fishcomtitle">
        <p v-if="fishes.length">選択カテゴリー：{{ fishes[0].species[0].content }}</p>
    </div>
    <div id="fishbody">
        <!-- 魚種の数分繰り返す -->
        <div class="fishbody" v-for="fish　in fishes" :key="fish.fish_id">
            <!--画像-->
            <div class="fishimg">
                <img :src="getFishImageSrc(fish.fish_id)" :alt="fish.imageAltText">
            </div>
            <!--生体名-->
            <div class="fishname">
                <h2>名前</h2>
                    <div class="fishname">
                        <h3>{{ fish.name }}</h3>
                    </div>
                </div>
            <!--飼育要件-->
            <div class="requirement">
                <h2>飼育要件</h2>
                <div class="fishbodyinfo">
                    <div class="fishfeed">
                        <h3>餌:</h3>
                        <h4>{{ fish.feed[0].content }}</h4>
                    </div>
                    <div class="fishph">
                        <h3>要求酸性度：</h3>
                        <h4>{{ fish.ph[0].content }}</h4>
                    </div>
                    <div class="fishcaution">
                        <h3>注意事項：</h3>
                        <h4>{{ fish.caution[0].content }}</h4>
                    </div>
                    <div class="fishsize">
                        <h3>サイズ：</h3>
                        <h4>{{ (fish.size / 10).toFixed(1) }} cm</h4>
                    </div>
                </div>
            </div>
            <!--飼育のポイント-->
            <div class="point">
                <h2>飼育のポイント</h2>
                <div class="fishbodyinfo">
                    <p>{{ fish.point }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        fishes: {
            type: Array,
            default: () => []
        }
    },
    methods: {
        getFishImageSrc(fish_id) {
            return `/image/fish/${fish_id}.jpg`;
        },
    },
    mounted() {
        console.log(this.fishes);
    },
}
</script>


<style>
.fishcomtitle p {
        background-color: #6495ed; 
        color: white;
        font-size: 8vw; 
        font-weight: 900; 
        padding: 1% 2%; 
        text-align: center;
        border-radius: 10px;
        margin: 1% 3%;
        box-shadow: inset 0 0 0 3px white, 0 0 0 5px #6495ed; 
    }
    .fishimg{
        margin: 0 10%;

    }
    .fishimg img{
        max-width: 70%;
        margin:0 auto;

    }
    .fishbody {
    margin-bottom: 10%;
    }
    #fishbody h2{
        font-size: 2rem;
        font-weight: 800;
        margin-left: 0;
        margin-bottom: 0;
        padding: 1% 10% 1% 10%;
        display: inline-block;
        background-color: lightblue; 
        width: 80%; 
        margin: 0 auto; 
    }
    #fishbody h3{
        font-size: 1.8rem;
        font-weight:600;
        padding: 1% 10% 1% 10%;
        width: 80%;
        position: relative;
    }
    #fishbody h3::after {
        content: ''; 
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 4px;
        background-color: lightblue;
    }
    #fishbody .fishbodyinfo p {
        font-size:4vw;
        margin:0 10%;
    }
    #fishbody h4 {
        font-size:1.6rem;
        font-weight: 600;
        margin-left:20%;
        border-bottom: 2px solid lightblue; /* h2の帯と同じ色の線、h3より少し細目 */
        display: inline-block; /* このスタイルを追加することで、下線が文字の下から右端まで伸びる */
        width: 100%; 
    }
    .fishpart {
        margin-top: 10%;
        display: flex;
    }

    .fishpartimg {
        width: 50%;
    }

    .fishpartinfo {
        width: 50%;
    }
</style>