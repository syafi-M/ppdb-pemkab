<script setup>
import NavLink from "./NavLink.vue";
</script>
<template>
    <div class="bg-slate-50 py-3 fixed top-0 w-full shadow z-[10]">
        <nav class="flex justify-between items-center mx-10">
            <div class="flex items-center gap-4 text-slate-800 font-semibold">
                <span
                    ><img
                        :src="'../images/pemkab.png'"
                        alt="logo"
                        srcset=""
                        class="w-10"
                /></span>
                <p>{{ $page.props.auth.user.name }}</p>
            </div>
            <div class="flex items-center gap-2">
                <NavLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    Dashboard
                </NavLink>
                <div
                    v-if="$page.props.auth.user.role_id == 1"
                    class="gap-2 flex items-center"
                >
                    <NavLink
                        :href="route('siswa.index')"
                        :active="route().current('siswa.index')"
                    >
                        Siswa
                    </NavLink>
                    <NavLink
                        :href="route('jurusan.index')"
                        :active="route().current('jurusan.index')"
                    >
                        Jurusan
                    </NavLink>
                </div>

                <NavLink
                    :href="route('logout')"
                    method="post"
                    as="Button"
                    class="bg-amber-400/90 hover:bg-amber-500 transition duration-150 ease-in-out border-none rounded-md px-2 py-1"
                >
                    Log out
                </NavLink>
            </div>
        </nav>
    </div>
</template>
