<template>
    <div class="triangle-up" @click="scrollToTop">
        <p><span></span>PageTop</p>
    </div>
</template>

<script>
export default {
    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            console.log('click');
        }
    }
}
</script>

<style>
    .triangle-up {
        position: fixed;
        right: 25%;
        bottom: 20px; 
        width:0;
        height:0;
        border-style:solid;
        border-width: 0 15px 30px 15px;
        border-color: transparent transparent #14579A transparent;
    }
    .triangle-up span {
        margin:15px;
    }
    .triangle-up p {
        font-size: 1.4rem;
    }
</style>