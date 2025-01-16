<script setup>
import {ref, onMounted} from "vue";
import {Link} from "@inertiajs/vue3";

// Slideshow data for Featured Vendors and WeddingPal Weddings
const featuredVendors = [
    {name: "Vendor 1", image: "https://via.placeholder.com/300x200?text=Vendor+1"},
    {name: "Vendor 2", image: "https://via.placeholder.com/300x200?text=Vendor+2"},
    {name: "Vendor 3", image: "https://via.placeholder.com/300x200?text=Vendor+3"},
];

const weddingPalWeddings = [
    {name: "Wedding 1", image: "https://via.placeholder.com/300x200?text=Wedding+1"},
    {name: "Wedding 2", image: "https://via.placeholder.com/300x200?text=Wedding+2"},
    {name: "Wedding 3", image: "https://via.placeholder.com/300x200?text=Wedding+3"},
];

const scrollY = ref(0);

onMounted(() => {
    window.addEventListener("scroll", () => {
        scrollY.value = window.scrollY;
    });
});
</script>

<template>
    <!-- Cover Image Section -->
    <div class="relative h-screen">
        <img
            src="/images/maincover.jpg"
            alt="Main cover"
            class="absolute inset-0 w-full h-full object-cover transition-all duration-500"
            :style="{
            opacity: 1 - (scrollY.value / 800),
            filter: 'brightness(' + (1 - scrollY.value / 800) + ') contrast(1.2)',
        }"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>

        <!-- Welcome Note Textbox -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="bg-gray-300 bg-opacity-60 p-8 rounded-xl text-center max-w-4xl">
                <h1 class="text-3xl font-semibold text-white">Welcome to WeddingPal!</h1>
                <p class="mt-4 text-lg text-gray-600">
                    You've come just to the right place to tweak your wedding to be the most amazing it can be! We're happy to show you our vast cohort of great wedding vendors and to help you easily plan your wedding. We help you keep track of everything related to your wedding to make this experience hassle free. At WeddingPal, we have the best wedding matrimonial service providers in the country. When you're ready, just hit the button below and we'll get you started!
                    <br>
                    <Link class="py-2 px-4 m-4 border-b-slate-800 bg-gray-600 text-white rounded-xl inline-block hover:text-blue-500 cursor-pointer transition-colors drop-shadow-lg duration-300" :href="'/register/client'">Get started!</Link>
                </p>
            </div>
        </div>
    </div>


    <!-- Featured Vendors Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-screen-lg mx-auto px-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-center mb-8">Featured Vendors</h2>
            <div class="flex overflow-x-auto space-x-6 pb-6">
                <div
                    v-for="vendor in featuredVendors"
                    :key="vendor.name"
                    class="flex-none w-80 bg-white rounded-xl shadow-lg overflow-hidden"
                >
                    <img :src="vendor.image" alt="Vendor" class="w-full h-48 object-cover rounded-t-xl"/>
                    <div class="p-6 text-center">
                        <p class="font-semibold text-lg">{{ vendor.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WeddingPal Weddings Section -->
    <section class="py-16 bg-white">
        <div class="max-w-screen-lg mx-auto px-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-center mb-8">WeddingPal Weddings</h2>
            <div class="flex overflow-x-auto space-x-6 pb-6">
                <div
                    v-for="wedding in weddingPalWeddings"
                    :key="wedding.name"
                    class="flex-none w-80 bg-white rounded-xl shadow-lg overflow-hidden"
                >
                    <img :src="wedding.image" alt="Wedding" class="w-full h-48 object-cover rounded-t-xl"/>
                    <div class="p-6 text-center">
                        <p class="font-semibold text-lg">{{ wedding.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Add padding to the sections and adjust the layout */
section {
    padding-left: 2rem;
    padding-right: 2rem;
}

/* Adding space between items */
.flex > div {
    margin-right: 1.5rem;
}

/* Reduce the horizontal space on smaller screens */
@media (max-width: 768px) {
    .flex {
        overflow-x: scroll;
        -webkit-overflow-scrolling: touch;
    }
}
</style>
