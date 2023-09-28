<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="min-h-screen flex w-full flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-sky-500/50 to-sky-400"
    >
        <div>
            <Link href="/">
                <div class="rounded-full bg-slate-50 p-2 scale-75">
                    <ApplicationLogo class="w-28 fill-current text-gray-500" />
                </div>
            </Link>
        </div>
        <div class="min-w-max max-w-2xl w-full">
            <div class="px-4 w-full flex items-center justify-center">
                <div
                    class="w-full sm:mx-0 sm:max-w-md mt-6 px-6 py-4 rounded-md bg-white shadow-md overflow-hidden sm:rounded-lg"
                >
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
