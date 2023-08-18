<template>
    <div id="trouble">
        <div class="troublepagetitle">
            <h1>よくあるトラブル</h1>
        </div>
        <div class="troublemessage">
            <h2>水槽を設置した後、発生しがちなトラブルや疑問にお答えします！</h2>
        </div>
        <div class="troublecontent">
            <!-- Here we loop over the troubles array, passed from Laravel, and display each item -->
            <div v-for="trouble in troubles" :key="trouble.id" class="troubleitem">
                <div class="troubletitle">
                    <h1>{{ trouble.title }}</h1>
                </div>
                <div class="troubleinfo">
                    <h2>{{ trouble.info }}</h2>
                </div>
                <div class="Measurelink">
                    <a href=/Measure class="button15">対策はコチラ</a>
                    <p class="button15" style="display: none;">ログインをしてご利用ください。</p>
                </div>
            </div>
        </div>
        <!--配列に値がない時は非表示-->

    </div>
</template>
<style>
#trouble {
    display: flex;
    flex-direction: column;
    align-items: center;
}
  
.troublepagetitle h1 {
    font-size: 3rem;
    text-align: center;
}
  
.troublemessage h2 {
    font-size: 1.5rem;
    margin: 0 10%;
}

.troublecontent{
    text-align: center;
    width: 80%;
    margin-right: auto;
}

.troubletitle h1{
    font-size: 2rem;
    border: 1px solid;
    border-radius: 10px 10px 0 0;
}

.troubleinfo h2 {
    border: 1px solid;
    text-align: left;
    border-radius: 0 0 10px 10px;
    margin: 0;
    padding: 3%;
}

.Measurelink{
    width: 125%;
    display: flex;
    justify-content: flex-end;
}

.button15 {
    display: block;
    width: 60%;
    padding: 3% 7%;
    border: 1px solid #982176;
    border-radius: 10px;
    color: #000;
    transition: box-shadow 0.3s ease, background-color 0.3s ease;
    background-color: #fff;
    font-size: 2rem;
    text-align: center;
}
</style>
<script>
export default {
    data() {
        return {
            troubles: [
                {
                    id: 1,
                    title: "トラブル1",
                    info: "これはトラブル1の詳細情報です。ここに具体的な問題やその対策などを詳細に書きます。"
                },
                {
                    id: 2,
                    title: "トラブル2",
                    info: "これはトラブル2の詳細情報です。ここに具体的な問題やその対策などを詳細に書きます。"
                },
            ]
        };
    },
}
</script>
