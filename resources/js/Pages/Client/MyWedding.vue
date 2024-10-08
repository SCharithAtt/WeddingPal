<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";

defineOptions({
    layout: ClientLayout
});
</script>

<template>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">My Wedding</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">Wedding Details</h2>
            <p class="text-gray-700">Date: <span class="font-medium">June 15, 2025</span></p>
            <p class="text-gray-700">Location: <span class="font-medium">The Grand Hall</span></p>
            <p class="text-gray-700">Time: <span class="font-medium">4:00 PM</span></p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">Guest List</h2>
            <ul class="list-disc pl-5">
                <li class="text-gray-700">John Doe</li>
                <li class="text-gray-700">Jane Smith</li>
                <li class="text-gray-700">Emily Johnson</li>
            </ul>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Guest</button>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">Budget Overview</h2>
            <p class="text-gray-700">Total Budget: <span class="font-medium">$20,000</span></p>
            <p class="text-gray-700">Spent: <span class="font-medium">$5,000</span></p>
            <p class="text-gray-700">Remaining: <span class="font-medium">$15,000</span></p>
        </div>

        <div>
            <h2 class="text-xl font-semibold">Important Dates</h2>
            <ul class="list-decimal pl-5">
                <li class="text-gray-700">Venue Booking: <span class="font-medium">April 1, 2025</span></li>
                <li class="text-gray-700">Invitation Send Out: <span class="font-medium">May 1, 2025</span></li>
            </ul>
        </div>
    </div>
</template>

<style scoped>
/* Add any scoped styles here */
</style>
