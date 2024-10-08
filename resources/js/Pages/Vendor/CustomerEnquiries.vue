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
            <tr class="border-b">
                <td class="px-4 py-2">John Doe</td>
                <td class="px-4 py-2">How to track my order?</td>
                <td class="px-4 py-2 text-green-600">Resolved</td>
                <td class="px-4 py-2">2024-10-01</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2">Jane Smith</td>
                <td class="px-4 py-2">What is your return policy?</td>
                <td class="px-4 py-2 text-yellow-600">Pending</td>
                <td class="px-4 py-2">2024-10-05</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2">Bob Johnson</td>
                <td class="px-4 py-2">Do you offer bulk discounts?</td>
                <td class="px-4 py-2 text-red-600">Unresolved</td>
                <td class="px-4 py-2">2024-10-07</td>
            </tr>
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

