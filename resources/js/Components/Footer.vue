<template>
    <footer>
        <div class="company">
            <h1>COMPANY</h1>
        </div>
        <div class="address">
            <h2>〒000-0000</h2>
            <h2>東京都〇〇区〇〇町〇〇〇</h2>
        </div>
        <div class="tel">
            <h2>TEL:000-0000-0000</h2>
        </div>
        <div class="companydetail">
            <h2>サイトマップ</h2>
            <h2>プライバシーポリシー</h2>
            <h2>©COMPANY</h2>
        </div>
    </footer>
</template>

<style>
footer {
    background-color: #F0F0F0;
    padding: 2% 7% 2% 7%;
    margin-top: 10%;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
}
.company h1 {
    text-align: center; 
    font-size: 2rem;
    font-weight: 400;
}

h2 {    
    font-size: 1rem;
    margin: 3%;
}
.address {
    display:flex;
    justify-content: space-between;

    margin: 3% 10%;
}

.tel, .companydetail {
    text-align: center;
    font-size: 0.5rem;
}
</style>