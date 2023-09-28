<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import BtnCreate from "@/Components/BtnCreate.vue";
import BtnBack from "@/Components/BtnCreate.vue";
import Modal from "@/Components/Modal.vue";
import Create from "./Create.vue";
import BtnEdit from "@/Components/BtnEdit.vue";
import BtnDestroy from "@/Components/BtnDestroy.vue";
import Edit from "./Edit.vue";

const props = defineProps(["jurusan"]);

const selectedJurusan = ref(null);
const tambahJurusan = ref(false);
const editJurusan = ref(false);

const ngeditJurusan = (jurusan) => {
    try {
        selectedJurusan.value = jurusan;
        editJurusan.value = true;
        console.log(jurusan);
    } catch (error) {
        console.log(error);
    }
};

selectedJurusan.value = props.jurusan;
</script>
<template>
    <Head title="Index Jurusan" />
    <AuthenticatedLayout>
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <p class="text-center text-2xl my-10 font-bold">
                        Index Jurusan
                    </p>
                    <div
                        class="mx-10 py-1 rounded flex flex-col justify-center my-10"
                    >
                        <div class="flex justify-end mb-4">
                            <BtnCreate @click.prevent="tambahJurusan = true"
                                >+ Jurusan</BtnCreate
                            >
                        </div>
                        <table
                            class="table table-zebra table-sm shadow rounded"
                        >
                            <thead>
                                <tr class="text-center">
                                    <th
                                        colspan="6"
                                        class="py-1 px-2 bg-sky-500 text-slate-50 rounded-t"
                                    >
                                        Table Jurusan
                                    </th>
                                </tr>
                                <tr
                                    class="text-center bg-sky-500 border-collapse text-slate-50"
                                >
                                    <th
                                        class="border-t border-r border-slate-600/70"
                                    >
                                        No
                                    </th>
                                    <th
                                        colspan="3"
                                        class="border-t border-slate-600/70"
                                    >
                                        Gambar
                                    </th>
                                    <th
                                        colspan=""
                                        class="border-t border-l border-slate-600/70"
                                    >
                                        Keterangan
                                    </th>
                                    <th
                                        class="border-t border-l border-slate-600/70"
                                    >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="props.jurusan.length">
                                    <template
                                        v-for="(jur, i) in props.jurusan"
                                        :key="jur.id"
                                        :jurusan="jur"
                                    >
                                        <tr>
                                            <td
                                                rowspan="2"
                                                class="px-2 text-center"
                                            >
                                                {{ i + 1 }}.
                                            </td>
                                            <td
                                                colspan="6"
                                                class="font-semibold"
                                            >
                                                ~ Jurusan {{ jur.name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img
                                                    v-if="jur.image1"
                                                    :src="
                                                        $page.props.ziggy.url +
                                                        '/storage/images/' +
                                                        jur.image1
                                                    "
                                                    :alt="
                                                        'No image for ' +
                                                        jur.name
                                                    "
                                                    width="160"
                                                />
                                                <span v-else
                                                    ><img
                                                        :src="'../images/no-image.jpg'"
                                                        alt="..."
                                                        srcset=""
                                                        width="120"
                                                /></span>
                                            </td>
                                            <td>
                                                <img
                                                    v-if="jur.image2"
                                                    :src="
                                                        $page.props.ziggy.url +
                                                        '/storage/images/' +
                                                        jur.image2
                                                    "
                                                    :alt="
                                                        'No image for ' +
                                                        jur.name
                                                    "
                                                    width="160"
                                                />
                                                <span v-else
                                                    ><img
                                                        :src="'../images/no-image.jpg'"
                                                        alt="..."
                                                        srcset=""
                                                        width="120"
                                                /></span>
                                            </td>
                                            <td>
                                                <img
                                                    v-if="jur.image3"
                                                    :src="
                                                        $page.props.ziggy.url +
                                                        '/storage/images/' +
                                                        jur.image3
                                                    "
                                                    :alt="
                                                        'No image for ' +
                                                        jur.name
                                                    "
                                                    width="160"
                                                />
                                                <span v-else
                                                    ><img
                                                        :src="'../images/no-image.jpg'"
                                                        alt="..."
                                                        srcset=""
                                                        width="120"
                                                /></span>
                                            </td>

                                            <td>
                                                {{ jur.keterangan }}
                                            </td>
                                            <td class="">
                                                <span
                                                    class="flex justify-center items-center gap-2"
                                                >
                                                    <BtnEdit
                                                        @click.prevent="
                                                            ngeditJurusan(jur)
                                                        "
                                                    />
                                                    <BtnDestroy />
                                                </span>
                                            </td>
                                        </tr>
                                    </template>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td>~ Data Kosong ~</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Permodalan duniawi -->
        <div>
            <Modal :show="tambahJurusan" @close="tambahJurusan = false">
                <Create
                    @submit="tambahJurusan = false"
                    @terCreate="tambahJurusan = false"
                >
                    <BtnBack @click="tambahJurusan = false"> close </BtnBack>
                </Create>
            </Modal>
            <Modal :show="editJurusan" @close="editJurusan = false">
                <Edit @submit="editJurusan = false" :jurusan="selectedJurusan">
                    <BtnBack @click="editJurusan = false"> close </BtnBack>
                </Edit>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>
