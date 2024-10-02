<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

const isDropdownOpen = ref(false);

function toggleDropdown() {
    isDropdownOpen.value = !isDropdownOpen.value;
}

function closeDropdown() {
    isDropdownOpen.value = false;
}
</script>

<template>
    <div class="page-container">
        <!-- Navigation bar -->
        <div class="navigation-bar bg-gray-400 opacity-75 p-4 rounded-md shadow-md">
            <ul class="flex items-center justify-between">
                <li>
                    <Link href="#" class="text-white font-bold text-xl">WeddingPal</Link>
                </li>
                <li class="relative" @mouseenter="isDropdownOpen = true" @mouseleave="closeDropdown">
                    <a href="#" class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">
                        Start Planning Your Wedding
                    </a>
                    <div v-if="isDropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                        <Link
                            v-if="canLogin"
                            :href="route('login')"
                            class="block px-4 py-2 text-black hover:bg-gray-200"
                        >
                            Log in
                        </Link>
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="block px-4 py-2 text-black hover:bg-gray-200"
                        >
                            Register
                        </Link>
                    </div>
                </li>
                <li v-for="item in ['Find Vendors', 'Wedding Inspiration', 'Destination Weddings', 'Why WeddingPal?', 'Become a Vendor', 'About Us']" :key="item">
                    <a href="#" class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">
                        {{ item }}
                    </a>
                </li>
            </ul>
        </div>
        <!-- Main content -->
        <slot />
    </div>
</template>

<style>
.page-container {
    min-height: 100vh;
    background-color: #f8fafc; /* Tailwind's gray-100 */
}
</style>
