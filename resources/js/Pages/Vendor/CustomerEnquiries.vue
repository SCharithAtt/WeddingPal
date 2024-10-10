<template>
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold">Customer Inquiries</h2>
        <div class="mt-4">
            <div class="flex justify-between items-center">
                <input type="text" placeholder="Search inquiries..." class="border border-gray-300 rounded p-2 w-1/2" />
                <button class="ml-4 bg-blue-500 text-white py-2 px-4 rounded">Add New Inquiry</button>
            </div>
        </div>
        <table class="min-w-full mt-6">
            <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 text-left">Customer Name</th>
                <th class="px-4 py-2 text-left">Inquiry</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Date</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</template>

<script setup>

import VendorLayout from "@/Layouts/VendorLayout.vue";

defineOptions({
    layout : VendorLayout,
});
</script>

