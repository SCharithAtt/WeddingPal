<template>
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold">Calendar</h2>
        <div class="mt-4">
            <p class="text-gray-600">No upcoming events.</p>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Add Event</button>
        </div>
        <div class="mt-6">
            <h3 class="text-xl font-semibold">Upcoming Events</h3>
            <ul class="mt-2">
                <li class="border-b py-2">Meeting with Supplier - 2024-10-10</li>
                <li class="border-b py-2">Customer Feedback Session - 2024-10-15</li>
            </ul>
        </div>
    </div>
</template>

<script setup>


import VendorLayout from "@/Layouts/VendorLayout.vue";

defineOptions({
    layout : VendorLayout,
});
</script>

