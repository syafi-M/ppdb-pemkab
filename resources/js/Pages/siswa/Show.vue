<script setup>
import BtnBack from "@/Components/BtnBack.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    siswa: {
        type: Object,
    },
});
</script>
<template>
    <Head title="Detail Siswa" />
    <div class="m-10 capitalize">
        <div
            class="text-center -skew-x-6 text-2xl py-2 text-slate-50 bg-cyan-500 mb-10 font-semibold"
        >
            <p>Info lengkap: {{ siswa.fullname }}</p>
        </div>
        <div class="flex justify-evenly">
            <div>
                <p>Nama Lengkap</p>
                <p>NISN</p>
                <p>NIK</p>
                <p>Nomor telepon</p>
                <p>Nomor Aktif</p>
                <p>Asal Sekolah</p>
                <p>Tinggal Bersama</p>
                <p>Alamat Siswa</p>
                <p>Nama Wali</p>
                <p>Alamat Wali</p>
                <p>Domisili</p>
                <p>Jurusan</p>
                <p v-if="siswa.status == 'lunas'">Status</p>
                <p v-else>Status</p>
            </div>
            <div>
                <p>
                    :
                    {{ siswa.fullname }}
                </p>
                <p>
                    :
                    {{ siswa.nisn }}
                </p>
                <p>
                    :
                    {{ siswa.nik }}
                </p>
                <p>
                    :
                    {{ siswa.no_telp }}
                </p>
                <p>
                    :
                    {{ siswa.no_aktif }}
                </p>
                <p>
                    :
                    {{ siswa.asal_sekolah }}
                </p>
                <p>
                    :
                    {{ siswa.tinggal_bersama }}
                </p>
                <p>
                    :
                    {{ siswa.alamat_siswa }}
                </p>
                <p>
                    :
                    {{ siswa.nama_wali }}
                </p>
                <p>
                    :
                    {{ siswa.alamat_wali }}
                </p>
                <p>
                    :
                    {{ siswa.domisili }}
                </p>
                <p>
                    :
                    {{ siswa.jurusan.name }}
                </p>
                <div
                    v-if="siswa.status == 'lunas'"
                    class="bg-emerald-400/70 p-2 rounded skew-y-3"
                >
                    <p class="-skew-y-3 text-slate-50 font-semibold">
                        : Sudah Daftar Ulang
                    </p>
                </div>
                <div v-else class="bg-red-400/70 p-2 rounded -skew-y-3">
                    <p class="skew-y-3 text-slate-50 font-semibold">
                        : Belum Daftar Ulang
                    </p>
                </div>
            </div>
        </div>
        <div class="my-5 flex justify-center">
            <slot />
        </div>
    </div>
</template>
