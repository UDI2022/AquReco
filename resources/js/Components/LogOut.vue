<script setup>
import { router } from '@inertiajs/vue3';

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <form @submit.prevent="logout">
        <button type="submit" class="navmenu">
            <h2>Log Out</h2>

        </button>
    </form>
</template>

<style>
    button{
        width: 100%;
        text-align: left;
    }
</style>
