<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref } from "vue";

const emits = defineEmits(["terCreate", "submit"]);
const tambahJurusan = ref(false);

const form = useForm({
    name: "",
    image1: null,
    image2: null,
    image3: null,
    keterangan: "",
});

const handleImageUpload = (imageNumber, event) => {
    if (event && event.target) {
        const file = event.target.files[0];
        form[`image${imageNumber}`] = file;
    }
};

const getImageUrl = (file) => {
    if (file instanceof File) {
        const url = URL.createObjectURL(file);
        return url;
    }
    return null;
};

const submitForm = () => {
    try {
        form.post(route("jurusan.store", form.data));
        tambahJurusan.value = false;
        console.log(form);
    } catch (error) {
        console.error(error);
    }
};
</script>

<template>
    <Head title="Create Jurusan" />
    <div class="py-12 pt-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p class="text-center text-2xl my-10 font-bold">
                    Halaman Tambah Jurusan
                </p>
                <div class="mb-5 mx-10">
                    <slot />
                </div>
                <div class="mx-10">
                    <form
                        @submit.prevent="submitForm"
                        enctype="multipart/form-data"
                        class="space-y-2"
                    >
                        <!-- Nama Jurusan -->
                        <div>
                            <InputLabel for="name" value="Nama Jurusan" />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Masukkan nama lengkap..."
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
                        </div>
                        <div class="flex justify-around">
                            <div v-if="form.image1" class="flex justify-center">
                                <img
                                    :src="getImageUrl(form.image1)"
                                    alt="Gambar 1 Preview"
                                    width="160"
                                    class="my-3 rounded shadow"
                                />
                            </div>

                            <div v-if="form.image2" class="flex justify-center">
                                <img
                                    :src="getImageUrl(form.image2)"
                                    alt="Gambar 2 Preview"
                                    width="160"
                                    class="my-3 rounded shadow"
                                />
                            </div>
                            <div v-if="form.image3" class="flex justify-center">
                                <img
                                    :src="getImageUrl(form.image3)"
                                    alt="Gambar 3 Preview"
                                    width="160"
                                    class="my-3 rounded shadow"
                                />
                            </div>
                        </div>

                        <!-- Gambar 1 -->
                        <div>
                            <InputLabel for="image1" value="Gambar 1" />
                            <input
                                type="file"
                                name="image1"
                                id="image1"
                                @change="handleImageUpload(1, $event)"
                                accept="image/*"
                                class="file-input file-input-bordered w-full"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.image1"
                            />
                        </div>

                        <!-- Gambar 2 -->
                        <div>
                            <InputLabel for="image2" value="Gambar 2" />

                            <input
                                type="file"
                                name="image2"
                                id="image2"
                                @change="handleImageUpload(2, $event)"
                                accept="image/*"
                                class="file-input file-input-bordered w-full"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.image2"
                            />
                        </div>

                        <!-- Gambar 3 -->
                        <div>
                            <InputLabel for="image3" value="Gambar 3" />

                            <input
                                type="file"
                                name="image3"
                                id="image3"
                                @change="handleImageUpload(3, $event)"
                                accept="image/*"
                                class="file-input file-input-bordered w-full"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.image3"
                            />
                        </div>

                        <!-- Keterangan -->
                        <div>
                            <InputLabel for="keterangan" value="Keterangan" />
                            <textarea
                                name="keterangan"
                                id="keterangan"
                                v-model="form.keterangan"
                                cols="30"
                                rows="3"
                                class="textarea-bordered textarea w-full"
                            ></textarea>
                            <InputError
                                class="mt-2"
                                :message="form.errors.keterangan"
                            />
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end">
                            <PrimaryButton class="my-10">Simpan</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
