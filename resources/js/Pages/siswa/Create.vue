<script setup>
import BtnBack from "@/Components/BtnBack.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import { getCurrentInstance } from "vue";
import { ref } from "vue";
import { useToast } from "vue-toastification";

const toast = useToast();

const { jurusan } = defineProps(["jurusan"]);

const emits = defineEmits(["tercreate", "submit"]);

const tambahSiswa = ref(false);

const form = useForm({
    fullname: "",
    nisn: "",
    nik: "",
    no_telp: "",
    asal_sekolah: "",
    tinggal_bersama: "",
    alamat_siswa: "",
    nama_wali: "",
    alamat_wali: "",
    domisili: "",
    no_aktif: "",
    id_jurusan: "~ Pilih Jurusan ~",
});

const submitForm = () => {
    try {
        form.post(route("siswa.store"), form.data);
        toast.success("Berhasil Menambahkan Siswa", {
            timeout: 2000,
        });
        tambahSiswa.value = false;
        emits("tercreate");
    } catch (error) {
        console.error(error);
    }
};
</script>
<template>
    <Head title="Create Siswa" />
    <div class="py-12 pt-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p class="text-center text-2xl my-10 font-bold">
                    Halaman Tambah Siswa
                </p>

                <div class="mb-5">
                    <slot />
                </div>
                <div class="mx-10">
                    <form @submit.prevent="submitForm" class="space-y-2">
                        <div>
                            <!-- name -->
                            <InputLabel for="fullname" value="Nama Lengkap" />
                            <TextInput
                                id="fullname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.fullname"
                                required
                                autofocus
                                autocomplete="fullname"
                                placeholder="masukkan nama lengkap..."
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.fullname"
                            />
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <!-- nisn -->
                                <InputLabel for="nisn" value="NISN" />
                                <TextInput
                                    id="nisn"
                                    type="tel"
                                    pattern="[0-9]*"
                                    class="mt-1 block w-full"
                                    v-model="form.nisn"
                                    required
                                    autofocus
                                    autocomplete="nisn"
                                    placeholder="masukkan nomor NISN"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.nisn"
                                />
                            </div>
                            <div class="w-full">
                                <!-- nik -->
                                <InputLabel for="nik" value="NIK" />
                                <TextInput
                                    id="nik"
                                    type="tel"
                                    pattern="[0-9]*"
                                    class="mt-1 block w-full"
                                    v-model="form.nik"
                                    required
                                    autofocus
                                    autocomplete="nik"
                                    placeholder="masukkan nomor NIK"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.nik"
                                />
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <!-- no_telp -->
                                <InputLabel
                                    for="no_telp"
                                    value="Nomor Telepon"
                                />
                                <TextInput
                                    id="no_telp"
                                    type="tel"
                                    pattern="[0-9]*"
                                    class="mt-1 block w-full"
                                    v-model="form.no_telp"
                                    required
                                    autofocus
                                    autocomplete="no_telp"
                                    placeholder="masukkan nomor telepon siswa"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.no_telp"
                                />
                            </div>
                            <div class="w-full">
                                <!-- no_aktif -->
                                <InputLabel
                                    for="no_aktif"
                                    value="Nomor Aktif"
                                />
                                <TextInput
                                    id="no_aktif"
                                    type="tel"
                                    pattern="[0-9]*"
                                    class="mt-1 block w-full"
                                    v-model="form.no_aktif"
                                    required
                                    autofocus
                                    autocomplete="no_aktif"
                                    placeholder="masukkan nomor telepon aktif"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.no_aktif"
                                />
                            </div>
                        </div>

                        <div>
                            <!-- asal_sekolah -->
                            <InputLabel
                                for="asal_sekolah"
                                value="Asal Sekolah"
                            />
                            <TextInput
                                id="asal_sekolah"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.asal_sekolah"
                                required
                                autofocus
                                autocomplete="asal_sekolah"
                                placeholder="masukkan sekolah asal"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.asal_sekolah"
                            />
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <!-- tinggal_bersama -->
                                <InputLabel
                                    for="tinggal_bersama"
                                    value="Tinggal Bersama"
                                />
                                <TextInput
                                    id="tinggal_bersama"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.tinggal_bersama"
                                    required
                                    autofocus
                                    autocomplete="tinggal_bersama"
                                    placeholder="('ortu', 'saudara', 'kakek nenek', kost, dll)"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.tinggal_bersama"
                                />
                            </div>
                            <div class="w-full">
                                <!-- alamat_siswa -->
                                <InputLabel
                                    for="alamat_siswa"
                                    value="Alamat Siswa"
                                />
                                <TextInput
                                    id="alamat_siswa"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.alamat_siswa"
                                    required
                                    autofocus
                                    autocomplete="alamat_siswa"
                                    placeholder="masukkan alamat siswa sekarang"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.alamat_siswa"
                                />
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <!-- nama_wali -->
                                <InputLabel for="nama_wali" value="Nama Wali" />
                                <TextInput
                                    id="nama_wali"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.nama_wali"
                                    required
                                    autofocus
                                    autocomplete="nama_wali"
                                    placeholder="masukkan nama wali siswa"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.nama_wali"
                                />
                            </div>
                            <div class="w-full">
                                <!-- alamat_wali -->
                                <InputLabel
                                    for="alamat_wali"
                                    value="Alamat Wali"
                                />
                                <TextInput
                                    id="alamat_wali"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.alamat_wali"
                                    required
                                    autofocus
                                    autocomplete="alamat_wali"
                                    placeholder="masukkan alamat wali siswa"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.alamat_wali"
                                />
                            </div>
                        </div>
                        <div>
                            <!-- domisili -->
                            <InputLabel for="domisili" value="Domisili" />
                            <TextInput
                                id="domisili"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.domisili"
                                required
                                autofocus
                                autocomplete="domisili"
                                placeholder="domisili sekarang ('ponorogo', 'madiun', dll)"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.domisili"
                            />
                        </div>

                        <div>
                            <!-- id_jurusan -->
                            <InputLabel for="id_jurusan" value="Jurusan" />
                            <select
                                v-model="form.id_jurusan"
                                name="id_jurusan"
                                id="id_jurusan"
                                class="select select-bordered w-full"
                            >
                                <option selected disabled>
                                    ~ Pilih Jurusan ~
                                </option>
                                <option
                                    v-for="jur in jurusan"
                                    :key="jur.id"
                                    :value="jur.id"
                                >
                                    {{ jur.name }}
                                </option>
                            </select>
                            <InputError
                                class="mt-2"
                                :message="form.errors.id_jurusan"
                            />
                        </div>
                        <div class="flex justify-end">
                            <PrimaryButton class="my-10">Simpan</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
