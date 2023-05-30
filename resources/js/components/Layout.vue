<template>
    <Head title="Perky Rabbit Code Test"></Head>
    <div class="bg-gray-100">
        <div class="flex flex-col min-h-screen">
            <div class="flex items-center justify-between bg-gray-800 py-4 px-6">
                <div class="text-white font-bold text-xl">Inventory System</div>
                <div class="relative" id="userButton" @click="toggleUserDropdown">
                    <button
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-white text-gray-800 focus:outline-none">
                        <i class="fas fa-user"></i>
                    </button>
                    <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg"
                        :class="{ hidden: isUserDropdownHidden }">
                        <a href="#" class="block px-4 py-2 text-white hover:bg-gray-700">Profile</a>
                        <Link href="/logout" method="post" class="block px-4 py-2 text-white hover:bg-gray-700">Logout
                        </Link>
                    </div>
                </div>
            </div>

            <div class="flex flex-1">
                <sidebar :active-menu-item.sync="activeMenuItem" @update:active-menu-item="activeMenuItem = $event">
                </sidebar>
                <div class="bg-gray p-4 flex-1">
                    <section class="border m-3 p-3">
                        <slot></slot>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import Sidebar from '@/components/Sidebar.vue';
import { Link } from '@inertiajs/vue3';
</script>

<script>
export default {
    data() {
        return {
            activeMenuItem: 'dashboard',
            isUserDropdownHidden: true,
        };
    },
    methods: {
        toggleUserDropdown() {
            this.isUserDropdownHidden = !this.isUserDropdownHidden;
        },
        hideUserDropdown() {
            this.isUserDropdownHidden = true;
        },
    },
};
</script>

<style>
/* Styles for the active menu item */
.active {
    font-weight: bold;
    color: white;
}
</style>



