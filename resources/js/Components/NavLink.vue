<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? "inline-flex items-center h-8 px-1 pt-1 ring-2 hover:ring-0 hover:shadow-inner hover:border-0 border-b-2 border-blue-400 text-md hover:bg-blue-300/50 transition duration-150 ease-in-out px-2 py-1 rounded hover:text-slate-600  font-medium text-slate-800 font-semibold leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
        : "inline-flex items-center h-8 px-1 pt-1 border-b-2 border-transparent text-md hover:bg-blue-300/50 transition duration-150 ease-in-out px-2 py-1 rounded hover:text-slate-600  font-medium text-slate-800 font-semibold leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
