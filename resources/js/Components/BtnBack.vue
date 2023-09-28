<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    click: {
        type: String,
    },
});
</script>

<template>
    <button
        @click="click"
        class="bg-amber-400/90 hover:bg-amber-500 font-semibold text-slate-700 transition duration-150 ease-in-out border-none rounded-md px-3 py-3 mx-10"
    >
        <a><i class="ri-arrow-left-line"></i>Kembali</a>
    </button>
</template>
