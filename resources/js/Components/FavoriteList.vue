<template>
    <div id="favorite">
        <div class="favoritetitle">
            <h1>Your Favorite</h1>
        </div>
        <div class="favoritemessage">
            <h2>お客様がお気に入りに保存した商品リストです。</h2>
            <h2>買い残しはありませんか？</h2>
        </div>
        <div class="favoritelist">
            <div class="favoritelistpart" v-for="(part, index) in favorites" :key="index">
              <div class="favoritelistimg">
                <img :src="part.image">
              </div>
              <div class="favoritelistinfo">
                <div class="favoritename">
                  <p>{{ part.name }}</p>
                </div>
                
                <div class="favoritecost">
                  <p>{{ part.cost }}</p>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            favorites: [
                {
                    name: 'テスト商品1',
                    image: '/image/sample.jpg',
                    cost: '1000円'
                },
                {
                    name: 'テスト商品2',
                    image: '/image/sample.jpg',
                    cost: '2000円'
                },
                // ... more favorites
            ]
        }
    },
    methods: {
        // removeFavorite(index) {
        //     this.favorites.splice(index, 1);
        // }
    }
}
</script>


<style>
    #favorite {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .favoritetitle h1 {
        font-size: 3rem;
        text-align: center;
    }
    .favoritemessage h2 {
        font-size: 1.5rem;
        margin: 0 10%;
    }
    .favoritelist {
        margin: 0 7%;
    }
    .favoritelistpart{
        margin-top: 10%;
        display: flex;
    }
    .favoritelistimg {
        width: 50%;
    }

    .favoritelistinfo {
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .favoritename{
        font-size: 1.4rem;
        text-align: center;
    }
    .favoritecost{
        font-size: 1.3rem;
        text-align: right;
        width: 100%;
    }
</style>
