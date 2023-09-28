<script setup>
import { Head, Link } from "@inertiajs/vue3";
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    tahun: {
        type: String,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div class="bg-[url('../images/bg-biru.jpg')] h-screen">
        <div class="bg-slate-50 py-4 w-full shadow-md rounded-b-md top-0">
            <p
                class="mx-4 text-slate-800 font-semibold flex items-center gap-2"
            >
                <span
                    ><img
                        :src="'../images/pemkab.png'"
                        alt=""
                        srcset=""
                        class="w-10" /></span
                >PPDB | {{ tahun }}, SMK Pemkab Ponorogo
            </p>
        </div>
        <div class="flex items-center text-center justify-center my-10">
            <div class="m-5 max-w-3xl bg-slate-50 px-4 py-2 shadow rounded">
                <div
                    class="my-5 font-semibold text-xl text-center text-slate-800"
                >
                    <p>Selamat Datang Di Web PPDB</p>
                    <p>SMK Pemkab Ponorogo Tahun {{ tahun }}</p>
                </div>
                <div class="mb-10 mx-10">
                    <p class="">
                        Ini adalah web untuk kegiatan PPDB SMK Pemkab Ponorogo
                        tahun {{ tahun }}, SMK Pemkab Ponorogo membuka
                        pendaftaran untuk siswa yang sudah lulus tingkatan SMP.
                    </p>
                    <p class="font-semibold my-10 text-lg">
                        Yuk Join SMK Pemkab Ponorogo :D
                    </p>
                </div>
                <div class="rounded bg-cyan-200 mb-10 mx-10">
                    <div class="flex items-center justify-center p-2">
                        <p
                            v-if="$page.props.auth.user"
                            class="w-[75%] text-center"
                        >
                            Anda Sudah Login
                        </p>
                        <p v-else class="w-[75%] text-center">
                            Silahkan Login, Jika Anda Belum Memiliki Akun
                            Silahkan Daftar
                        </p>
                    </div>
                </div>
                <div v-if="canLogin" class="flex mb-8 justify-center gap-5">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="px-4 py-2 rounded bg-sky-400 font-semibold text-slate-50 shadow-md hover:bg-sky-500 hover:text-slate-100 transition .2s ease-in-out"
                        >Dashboard</Link
                    >
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="px-4 py-2 rounded bg-sky-400 font-semibold text-slate-50 shadow-md hover:bg-sky-500 hover:text-slate-100 transition .2s ease-in-out"
                            >Log in</Link
                        >
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="px-4 py-2 rounded bg-teal-400 font-semibold text-slate-50 shadow-md hover:bg-teal-500 hover:text-slate-100 transition .2s ease-in-out"
                            >Daftar</Link
                        >
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
