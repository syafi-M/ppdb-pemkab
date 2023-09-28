<script setup>
import BtnDestroy from "@/Components/BtnDestroy.vue";
import BtnCreate from "@/Components/BtnCreate.vue";
import BtnEdit from "@/Components/BtnEdit.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import BtnShow from "@/Components/BtnShow.vue";
import Show from "./Show.vue";
import Create from "./Create.vue";
import { useToast } from "vue-toastification";
import BtnBack from "@/Components/BtnBack.vue";
import Edit from "./Edit.vue";
import ModalGua from "@/Components/ModalGua.vue";
import { computed } from "vue";
import Paginator from "@/Components/Paginator.vue";

const props = defineProps(["siswas", "jurusan"]);

const toast = useToast();

const handleTambahSiswa = () => {
    tambahSiswa.value = false;
};

const handleDeleteSiswa = (siswa) => {
    selectedSiswa.value = siswa;
    deleteSiswa.value = true;
};

const notifDaftar = (selectedSiswa) => {
    DaftarUlang.value = false;
    toast.success(selectedSiswa.fullname + " berhasil daftar ulang");
};

const notifDelete = (selectedSiswa) => {
    deleteSiswa.value = false;
    toast.info(selectedSiswa + " berhasil dihapus", { timeout: 2000 });
};

const showDaftarUlangModal = (siswa) => {
    selectedSiswa.value = siswa;
    DaftarUlang.value = true;
};

const ingfoSiswa = (siswa) => {
    selectedSiswa.value = siswa;
    infoSiswa.value = true;
};

const ngeditSiswa = (siswa, jurusan) => {
    selectedSiswa.value = siswa;
    selectedJurusan.value = jurusan;
    editSiswa.value = true;
};

const closeEditModal = () => {
    editSiswa.value = false;
};

const searchQuery = ref("");

const filteredSiswas = computed(() => {
    const query = searchQuery.value.toLowerCase().trim();
    const siswas = props.siswas.data;
    if (!query) {
        return siswas;
    }
    return siswas;
});
const clearSearch = () => {
    searchQuery.value = "";
};

const editSiswa = ref(false);
const DaftarUlang = ref(false);
const infoSiswa = ref(false);
const tambahSiswa = ref(false);
const deleteSiswa = ref(false);
const selectedSiswa = ref(null);
const selectedJurusan = ref(null);
</script>
<template>
    <Head title="Index Calon Siswa" />
    <AuthenticatedLayout>
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <p class="text-center text-2xl my-10 font-bold">
                        Index Calon Siswa
                    </p>

                    <div
                        class="mx-10 py-1 rounded flex flex-col justify-center my-10"
                    >
                        <div class="flex justify-between mb-4">
                            <div>
                                <form
                                    method="GET"
                                    :action="route('siswa.index')"
                                >
                                    <div>
                                        <input
                                            type="text"
                                            name="search"
                                            id="search"
                                            v-model="searchQuery"
                                            placeholder="Cari siswa..."
                                            class="input input-bordered"
                                        />
                                    </div>
                                </form>
                            </div>
                            <div>
                                <BtnCreate @click.prevent="tambahSiswa = true"
                                    >+ Siswa</BtnCreate
                                >
                            </div>
                        </div>
                        <table class="table table-zebra shadow rounded">
                            <thead>
                                <tr class="text-center">
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50 rounded-tl"
                                    >
                                        #
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        Nama Lengkap
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        NISN
                                    </th>

                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        Asal Sekolah
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        Alamat Siswa
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        Nama Wali
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        Domisili
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        No. Aktif
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        Jurusan
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="py-1 px-2 bg-sky-500 text-slate-50 rounded-tr"
                                    >
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-800">
                                <template v-if="filteredSiswas.length">
                                    <tr
                                        v-for="(siswa, i) in filteredSiswas"
                                        :key="siswa.id"
                                        :siswa="siswa"
                                    >
                                        <td
                                            class="py-1 px-2 capitalize font-semibold text-slate-700"
                                        >
                                            {{ i + 1 }}
                                        </td>
                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.fullname }}
                                        </td>
                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.nisn }}
                                        </td>

                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.asal_sekolah }}
                                        </td>
                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.alamat_siswa }}
                                        </td>
                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.nama_wali }}
                                        </td>
                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.domisili }}
                                        </td>
                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.no_aktif }}
                                        </td>
                                        <td
                                            class="py-1 px-2 break-words whitespace-pre-wrap capitalize font-semibold text-slate-700"
                                        >
                                            {{ siswa.jurusan.name }}
                                        </td>
                                        <td
                                            v-if="siswa.status == 'lunas'"
                                            class="py-1 px-2 capitalize font-semibold text-slate-700"
                                        >
                                            <p
                                                class="bg-emerald-400/70 p-2 rounded"
                                            >
                                                Lunas
                                            </p>
                                        </td>
                                        <td
                                            v-else
                                            class="py-1 px-2 capitalize font-semibold text-slate-700"
                                        >
                                            <button
                                                @click.prevent="
                                                    showDaftarUlangModal(siswa)
                                                "
                                                class="bg-red-400/70 p-2 rounded"
                                            >
                                                Daftar Ulang
                                            </button>
                                        </td>
                                        <td
                                            class="py-1 px-2 capitalize font-semibold text-slate-700"
                                        >
                                            <div class="flex gap-1">
                                                <!-- ingfoKan modal -->
                                                <button
                                                    @click.prevent="
                                                        ingfoSiswa(siswa)
                                                    "
                                                    class="bg-emerald-400 rounded-full py-[6px] px-[8px] text-lg"
                                                >
                                                    <i
                                                        class="ri-account-circle-line"
                                                    ></i>
                                                </button>

                                                <!-- Edit Modal -->
                                                <BtnEdit
                                                    @click.prevent="
                                                        ngeditSiswa(
                                                            siswa,
                                                            jurusan
                                                        )
                                                    "
                                                />

                                                <!-- delete modal -->
                                                <BtnDestroy
                                                    @click="
                                                        handleDeleteSiswa(siswa)
                                                    "
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr v-else>
                                    <td
                                        colspan="10"
                                        class="text-center font-semibold"
                                    >
                                        ~ Data Kosong ~
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-center m-2">
                        <Paginator
                            :per-page="$page.props.siswas.per_page"
                            :from="$page.props.siswas.from"
                            :to="$page.props.siswas.to"
                            :total="$page.props.siswas.total"
                            :if-prev="$page.props.siswas.prev_page_url"
                            :prev-href="$page.props.siswas.prev_page_url"
                            :if-after-prev="
                                $page.props.siswas.path +
                                    `?page=` +
                                    ($page.props.siswas.current_page - 2) >=
                                $page.props.siswas.first_page_url
                            "
                            :after-prev-href="
                                $page.props.siswas.path +
                                `?page=` +
                                ($page.props.siswas.current_page - 2)
                            "
                            :current-page="$page.props.siswas.current_page"
                            :if-after-next="
                                $page.props.siswas.current_page + 2 <=
                                $page.props.siswas.last_page
                            "
                            :after-next-href="
                                $page.props.siswas.path +
                                `?page=` +
                                ($page.props.siswas.current_page + 2)
                            "
                            :if-next="$page.props.siswas.next_page_url"
                            :next-href="$page.props.siswas.next_page_url"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- Permodalan -->
            <!-- Daftar ulang -->
            <Modal :show="DaftarUlang" @close="DaftarUlang = false">
                <div v-if="DaftarUlang" class="m-10">
                    <div class="flex items-center justify-center">
                        <div
                            class="bg-orange-400 text-slate-50 text-2xl mb-10 skew-y-1 rounded-md w-fit text-center font-semibold p-2"
                        >
                            <p>Konfirmasi Daftar Ulang</p>
                        </div>
                    </div>
                    <p>
                        Yakin mendaftarkan ulang
                        <span class="underline font-semibold">
                            {{ selectedSiswa.fullname }}
                        </span>
                        ?
                    </p>
                    <div class="flex justify-end gap-2">
                        <Link
                            :href="route('daftar.ulang', selectedSiswa.id)"
                            @click="notifDaftar(selectedSiswa)"
                            method="PATCH"
                        >
                            <button class="bg-cyan-400/70 px-3 py-2 rounded">
                                Submit
                            </button>
                        </Link>
                        <button
                            @click.prevent="DaftarUlang = false"
                            class="bg-red-400/70 px-3 py-2 rounded"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </Modal>
            <!-- create siswa -->
            <Modal :show="tambahSiswa" @close="tambahSiswa = false">
                <template v-if="tambahSiswa">
                    <Create
                        :jurusan="jurusan"
                        @submit.prevent="handleTambahSiswa"
                        @tercreate="tambahSiswa = false"
                    >
                        <BtnBack @click="tambahSiswa = false">
                            close
                        </BtnBack></Create
                    >
                </template>
            </Modal>
            <!-- Edit siswa -->
            <Modal :show="editSiswa" @close="editSiswa = false">
                <Edit
                    :siswa="selectedSiswa"
                    :jurusan="selectedJurusan"
                    @submit="closeEditModal"
                >
                    <BtnBack @click="editSiswa = false" />
                </Edit>
            </Modal>
            <!-- show -->
            <Modal :show="infoSiswa" @close="infoSiswa = false">
                <Show :siswa="selectedSiswa"
                    ><BtnBack @click="infoSiswa = false"
                /></Show>
            </Modal>
            <!-- delete -->
            <Modal :show="deleteSiswa" @close="deleteSiswa = false">
                <div class="m-10" v-if="deleteSiswa">
                    <div class="flex items-center justify-center">
                        <div
                            class="bg-red-500 text-slate-50 text-2xl mb-10 skew-y-1 rounded-md w-fit text-center font-semibold p-2"
                        >
                            <p>Konfirmasi Hapus Siswa</p>
                        </div>
                    </div>
                    <p>
                        Yakin ingin menghapus
                        <span class="underline font-semibold">
                            {{ selectedSiswa.fullname }}
                        </span>
                        ?
                    </p>
                    <div class="flex justify-end gap-2">
                        <Link
                            :href="route('siswa.destroy', selectedSiswa.id)"
                            @click="notifDelete(selectedSiswa.fullname)"
                            method="delete"
                            as="button"
                            class="bg-cyan-400/70 hover:bg-cyan-500/70 px-3 btn py-2 rounded"
                        >
                            <button type="submit">Submit</button>
                        </Link>
                        <button
                            @click.prevent="deleteSiswa = false"
                            class="bg-red-400/70 hover:bg-red-500/70 capitalize btn px-3 py-2 rounded"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>
