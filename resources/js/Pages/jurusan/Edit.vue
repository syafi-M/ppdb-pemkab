<script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref } from "vue";

const emits = defineEmits(["submit"]);

const editJurusan = ref(false);
const props = defineProps({
    jurusan: {
        type: Object,
    },
});
const oldImage1 = props.jurusan.image1;
const oldImage2 = props.jurusan.image2;
const oldImage3 = props.jurusan.image3;

const form = useForm({
    name: props.jurusan.name,
    image1: oldImage1 ? oldImage1 : null,
    image2: oldImage2 ? oldImage2 : null,
    image3: oldImage3 ? oldImage3 : null,
    keterangan: props.jurusan.keterangan,
    oldImage1: oldImage1,
    oldImage2: oldImage2,
    oldImage3: oldImage3,
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
    } else if (typeof file == "string") {
        const url = usePage().props.ziggy.url + "/storage/images/" + file;
        return url;
    }
    return null;
};

const submitForm = () => {
    try {
        form.put(route("jurusan.update", props.jurusan.id));
        editJurusan.value = false;
        // console.log(props.jurusan.id, "form data: ", form);
        emits;
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
                    Halaman Edit Jurusan
                </p>
                <div class="mb-5 mx-10">
                    <slot />
                </div>
                <div class="mx-10">
                    <form
                        @submit.prevent="submitForm"
                        enctype="multipart/form-data"
                        method="post"
                        class="space-y-2"
                    >
                        <!-- Nama Jurusan -->
                        <div>
                            <InputLabel for="name" value="Nama Jurusan" />
                            <TextInput
                                id="name"
                                name="name"
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
                                    v-if="form.image1 != null"
                                    :src="getImageUrl(form.image1)"
                                    alt="Gambar 1 Preview"
                                    width="160"
                                    class="my-3 rounded shadow"
                                />
                            </div>
                            <!-- old1 -->
                            <div v-else class="flex justify-center">
                                <img
                                    :src="getImageUrl(oldImage1)"
                                    alt="Gambar 1 Preview old"
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
                            <!-- old2 -->
                            <div v-else class="flex justify-center">
                                <img
                                    :src="getImageUrl(oldImage2)"
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
                            <!-- old3 -->
                            <div v-else class="flex justify-center">
                                <img
                                    :src="getImageUrl(oldImage3)"
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
                        <span class="hidden">
                            <input
                                type="text"
                                name="oldImage1"
                                id="image1"
                                v-model="form.oldImage1"
                            />
                            <input
                                type="text"
                                name="oldImage2"
                                id="image2"
                                v-model="form.oldImage2"
                            />
                            <input
                                type="text"
                                name="oldImage3"
                                id="image3"
                                v-model="form.oldImage3"
                            />
                        </span>

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
