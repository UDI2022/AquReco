<templete>
    <div>
        <h1>{{  PageTitle }}</h1>
    <div class="test">テストタイトル</div>
    </div>
</templete>

<script>
    export default {
        deta() {
            return {
                PageTitle: "This is TestPage",
            };
        },
    };
</script>

<style>
    .test {
        font-weight: 900;
    }
</style>
