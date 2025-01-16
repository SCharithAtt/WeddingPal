<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineOptions({
    layout: AppLayout,
});
</script>

<template>
    <div class="flex flex-col items-center justify-center min-h-screen p-6 bg-gray-50" style="background-image: url('https://elements-resized.envatousercontent.com/envato-shoebox/9b72/12d8-17f9-4111-9b38-f7534ddece4e/rm218batch2-aum-05.jpg?w=1600&cf_fit=scale-down&mark-alpha=18&mark=https%3A%2F%2Felements-assets.envato.com%2Fstatic%2Fwatermark4.png&q=85&format=auto&s=dee65198d1545953d120b743934738a606b616dbc6e24f651ba2f4f83aea4c17')">
        <div class="max-w-xl w-full text-center bg-white/80 p-8 rounded-lg shadow-lg grid place-items-center">
            <ApplicationLogo class="h-16 w-auto" />
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">
                You're almost done! Set Your Store Up on WeddingPal
            </h1>
            <p class="text-lg text-gray-600 mb-6">
                It seems you still haven't listed your store on WeddingPal. Please complete the steps below to set up your store.
            </p>
            <p class="text-base text-gray-500 mb-6 px-6">
                You're just minutes away from having your store listed in the WeddingPal directory. Click below to begin your journey as a vendor!
            </p>
            <Link
                class="mt-6 inline-block bg-gray-800 text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-gray-700 transition duration-200"
                :href="'/vendor/create'"
            >
                Set Up Your Store
            </Link>
        </div>
    </div>
</template>
