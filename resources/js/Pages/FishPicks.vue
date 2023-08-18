<template>
    <Header />
    <div id="fishlist">
        <div class="fishlistimage">
            <img src="/image/sample2.jpg" alt="３９熱帯魚水槽">
        </div>
        <div class="fishlistconcepttitle">
            <h3>Concept</h3>
            <h1>Fish</h1>
            <h2>群泳・ベタ・日淡・金魚・メダカ</h2>
        </div>
        <div class="fishpicksmessage">
            <h2>お客様が設定した水槽の主人公に合わせてレイアウト素材の提案をします。</h2>
            <h2>種類によっては、投入が推奨されない材料もあります。
                そのうえでご要望がある場合は、店員に相談しましょう！</h2>
        </div>
        <!--FsihLiskFishから選択したものが表示される-->
        <FIshListFishButton0 />
    </div>
    <LayoutTankSize />
    <SelectWoodLink />
    <SelectStoneLink />
    <SelectPlantLink />
    <SelectFishLink />
    <SelectProductLink />
    <MakeOrder />
    <ContactLink />
    <Footer />
</template>
<style>

</style>