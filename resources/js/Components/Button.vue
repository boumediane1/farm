<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-xs tracking-wide shadow rounded-md text-white bg-green-500 hover:bg-green-400 uppercase">
        <slot />
    </button>
</template>
