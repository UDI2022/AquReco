<template>
    <div id="NTV">
        <div class="NTVtitle">
            <h1>来店告知</h1>
        </div>
        <div class="NTVnav">
            <h2>お呼出し番号</h2>
        </div>
        <div class="NTVnum" v-for="(number, index) in numbersArray" :key="index">
                <h3>{{ number }}</h3>
            </div>
        <div class="NTVmessage">
            <h3>オーダーリストを元に店員からご案内いたします。</h3>
            <h3>上記お呼出し番号でお声がけいたしますので、少々お待ちください。</h3>
            <h3>ご利用ありがとうございます。</h3>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      numbersArray: [333], // Initialize the array with 333
    };
  },
};
</script>
<style>
    #NTV::before{
        content: '';
        position: absolute;
        left: 0vw;
        width: 70vw;
        height: 100%;
        background-color: #CEE6F3;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.6;
        z-index: -1;
    }
    .NTVtitle h1{
        font-size: 3rem;
        font-weight: 800;
        text-align: center;
    }
    .NTVnav h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-left: 5%;
    }
    .NTVnum h3{
        font-size: 5rem;
        font-weight: 900;
        text-align: center;
        color: #191970;
    }
    .NTVmessage h3 {
        margin: 0 5%;
        font-size:2rem;
    }
</style>