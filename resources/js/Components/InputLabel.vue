<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block font-medium text-sm text-gray-700" style="font-size: 1.5rem; margin: 5% 0 4% 0;">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
