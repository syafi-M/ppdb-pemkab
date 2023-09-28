<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12 pt-20 h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-slate-900 font-semibold">
                        Selamat Datang {{ $page.props.auth.user.name }}
                    </div>
                    <div class="p-6 space-y-4">
                        <p v-if="$page.props.auth.user.role_id == 1">
                            Dikarenakan anda adalah seorang admin, anda bisa
                            menggunakan tombol navigasi diatas untuk melakukan
                            pekerjaan
                        </p>
                        <p>Selamat Berselancar Di Website Ini :D</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
