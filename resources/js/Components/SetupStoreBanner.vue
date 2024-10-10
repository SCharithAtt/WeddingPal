<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';
</script>

<template>
    <div class="p-8 bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-xl transition-transform transform hover:scale-105 mb-6">
            <h1 class="text-2xl font-semibold">Set Up Your Store on WeddingPal</h1>
            <p class="text-base mt-3">You're just minutes away from having your store listed in the WeddingPal directory. Click below to begin your journey as a vendor!</p>
            <Link class="mt-4 inline-block bg-green-500 text-white font-semibold py-3 px-6 rounded-lg shadow hover:bg-green-600 transition duration-200"
                  :href="'/vendor/create'">
                Set Up Your Store
            </Link>
        </div>
    </div>
</template>
