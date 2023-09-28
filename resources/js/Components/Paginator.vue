<template>
    <div class="flex flex-col justify-center gap-2 items-center">
        <div>
            <p
                class="font-semibold p-2 bg-emerald-400 text-slate-200 rounded-md shadow-md"
            >
                Menampilkan {{ from }} sampai {{ to }}, dari total {{ total }}
            </p>
        </div>
        <div class="join text-sm shadow" v-if="total >= perPage">
            <Link
                class="join-item btn"
                v-if="ifAfterPrev"
                :href="afterPrevHref"
            >
                &laquo; -{{ currentPage - 1 }}</Link
            >
            <Link class="join-item btn" v-if="ifPrev" :href="prevHref">
                <span>&laquo;</span></Link
            >
            <button v-else disabled class="join-item btn">~</button>

            <button class="join-item btn">Page {{ currentPage }}</button>
            <Link class="join-item btn" v-if="ifNext" :href="nextHref"
                ><span>&raquo;</span>
            </Link>
            <button v-else disabled class="join-item btn btn-disabled">
                ~
            </button>

            <Link
                class="join-item btn"
                v-if="ifAfterNext"
                :href="afterNextHref"
            >
                +{{ currentPage + 1 }} &raquo;</Link
            >
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    perPage: {
        type: Number,
    },
    from: {
        type: Number,
    },
    to: {
        type: Number,
    },
    total: {
        type: Number,
    },
    ifPrev: {
        type: String,
    },
    prevHref: {
        type: String,
    },
    ifAfterPrev: {
        type: Boolean,
    },
    afterPrevHref: {
        type: String,
    },
    currentPage: {
        type: Number,
    },
    ifAfterNext: {
        type: Boolean,
    },
    afterNextHref: {
        type: String,
    },
    ifNext: {
        type: String,
    },
    nextHref: {
        type: String,
    },
});
</script>
