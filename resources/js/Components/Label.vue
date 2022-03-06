<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
