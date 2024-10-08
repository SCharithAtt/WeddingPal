<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";

defineOptions({
    layout: ClientLayout
});
</script>

<template>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Communications</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">Messages</h2>
            <div class="border rounded-md overflow-hidden">
                <div class="p-4 border-b">
                    <div class="flex justify-between">
                        <span class="font-medium">Vendor Name</span>
                        <span class="text-gray-500 text-sm">Oct 1, 2024</span>
                    </div>
                    <p class="text-gray-700">Your booking is confirmed for the wedding date!</p>
                </div>
                <div class="p-4 border-b">
                    <div class="flex justify-between">
                        <span class="font-medium">Wedding Planner</span>
                        <span class="text-gray-500 text-sm">Sep 30, 2024</span>
                    </div>
                    <p class="text-gray-700">Don’t forget to finalize your guest list.</p>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <span class="font-medium">Caterer</span>
                        <span class="text-gray-500 text-sm">Sep 29, 2024</span>
                    </div>
                    <p class="text-gray-700">We need the final menu selections by next week.</p>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">Send a Message</h2>
            <textarea class="w-full p-2 border rounded-md" rows="4" placeholder="Type your message here..."></textarea>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Send Message</button>
        </div>
    </div>
</template>

<style scoped>
/* Add any scoped styles here */
</style>
