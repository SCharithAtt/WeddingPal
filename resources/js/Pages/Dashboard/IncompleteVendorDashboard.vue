<script setup>
import SetupStoreBanner from "@/Components/SetupStoreBanner.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineOptions({
    layout: AppLayout,
});
</script>

<template>
    <div class="flex flex-col items-center justify-center min-h-screen p-6 bg-gray-50">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Registration Incomplete</h1>
        <p class="text-lg text-gray-600 mb-6">It seems you still haven't listed your store on WeddingPal. Please complete the steps below to set up your store.</p>
        <SetupStoreBanner />
    </div>
</template>
