<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
};
</script>

<template>
    <div class="fishescategorylist">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 1}" as="button">
                                <img src="/image/sample.jpg" alt="１８グッピー">
                                <div class="fish-title">グッピー</div>
                            </Link>
                        </div>
                    </td>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 2}" as="button">
                                <img src="/image/sample.jpg" alt="１９卵胎生メダカ">
                                <div class="fish-title">卵胎生メダカ</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 3}" as="button">
                                <img src="/image/sample.jpg" alt="２０卵生メダカ">
                                <div class="fish-title">胎生メダカ</div>
                            </Link>
                        </div>
                    </td>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 4}" as="button">
                                <img src="/image/sample.jpg" alt="２１カラシン">
                                <div class="fish-title">カラシン</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 5}" as="button">
                                <img src="/image/sample.jpg" alt="２２コイ">
                                <div class="fish-title">コイ</div>
                            </Link>
                        </div>
                    </td>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 6}" as="button">
                                <img src="/image/sample.jpg" alt="２３シクリッド">
                                <div class="fish-title">シクリッド</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 7}" as="button">
                                <img src="/image/sample.jpg" alt="２５エンゼルフィッシュ">
                                <div class="fish-title">エンジェルフィッシュ</div>
                            </Link>
                        </div>
                    </td>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 8}" as="button">
                                <img src="/image/sample.jpg" alt="２６ベタ・グラミー">
                                <div class="fish-title">ベタ・グラミー</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 9}" as="button">
                                <img src="/image/sample.jpg" alt="２７コリドラス">
                                <div class="fish-title">コリドラス</div>
                            </Link>
                        </div>
                    </td>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 10}" as="button">
                                <img src="/image/sample.jpg" alt="２８プレコ">
                                <div class="fish-title">プレコ</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 11}" as="button">
                                <img src="/image/sample.jpg" alt="２９ナマズの仲間">
                                <div class="fish-title">ナマズの仲間</div>
                            </Link>
                        </div>
                    </td>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 12}" as="button">
                                <img src="/image/sample.jpg" alt="３０シュリンプ">
                                <div class="fish-title">シュリンプ</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 13}" as="button">
                                <img src="/image/sample.jpg" alt="３１コケ取り生体">
                                <div class="fish-title">コケ取り生体</div>
                            </Link>
                        </div>
                    </td>
                    <td>
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 14}" as="button">
                                <img src="/image/sample.jpg" alt="３２その他">
                                <div class="fish-title">その他</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="fishescategory2">
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 15}" as="button">
                                <img src="/image/sample.jpg" alt="３３金魚">
                                <div class="fish-title">金魚</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="fishescategory2">
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 16}" as="button">
                                <img src="/image/sample.jpg" alt="３４メダカ">
                                <div class="fish-title">メダカ</div>
                            </Link>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="fishescategory2">
                        <div class="fish-img-wrapper">
                            <Link href="/Fish" method="post" :data="{ category: 17}" as="button">
                                <img src="/image/sample.jpg" alt="３５日淡">
                                <div class="fish-title">日淡</div>
                            </Link>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>



<style>
.fishescategorylist table , td, th {
	border: 1px solid #595959;
	border-collapse: separate;
}
.fishescategorylist td, th {
	padding: 3px;
	width: 40vw;
}
.fishescategorylist th {
	background: #f0e6cc;
}
.fishescategorylist{
    display: flex;
    justify-content: center;
    align-items: center;
}
.fishescategory2{
    height: 40vw;
}
.fish-img-wrapper {
    position: relative;
    height: 40vw;
    width: 100%;
    display: flex; 
    align-items: center; 
    overflow: hidden; 
}
.fish-img-wrapper img{
    object-fit: cover;
    width: 100%;
    min-height: 100%; 
    position: relative; 
}
.fish-title {
    position: absolute;
    bottom: 0;
    left: 0;
    color: #fff;
    background: rgba(0,0,0,0.5);  /* 背景色を半透明の黒に */
    padding: 5px;
}
.even {
	background: #fbf8f0;
}
.odd {
	background: #fefcf9;
}
</style>