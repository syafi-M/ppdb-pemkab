<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div>
            <Navbar />
        </div>
        <div class="bg-gradient-to-br from-sky-500/50 to-sky-400">
            <!-- Page Content -->
            <main class="min-h-screen">
                <div class="relative">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
