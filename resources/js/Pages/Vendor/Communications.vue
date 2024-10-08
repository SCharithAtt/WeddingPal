<template>
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold">Communications</h2>
        <div class="mt-4">
            <button class="bg-blue-500 text-white py-2 px-4 rounded">Compose New Message</button>
        </div>
        <ul class="mt-6 space-y-4">
            <li class="border-b pb-4">
                <div class="flex justify-between">
                    <span class="font-semibold">Customer: John Doe</span>
                    <span class="text-gray-500">2024-10-01</span>
                </div>
                <p class="mt-2">Thank you for your great service! I will definitely recommend you to my friends.</p>
            </li>
            <li class="border-b pb-4">
                <div class="flex justify-between">
                    <span class="font-semibold">Customer: Jane Smith</span>
                    <span class="text-gray-500">2024-10-05</span>
                </div>
                <p class="mt-2">I have a question about my order status. Please let me know.</p>
            </li>
            <li class="border-b pb-4">
                <div class="flex justify-between">
                    <span class="font-semibold">Customer: Bob Johnson</span>
                    <span class="text-gray-500">2024-10-07</span>
                </div>
                <p class="mt-2">Can I get a discount for a bulk order? Please contact me.</p>
            </li>
        </ul>
    </div>
</template>

<script setup>

import VendorLayout from "@/Layouts/VendorLayout.vue";

defineOptions({
    layout : VendorLayout,
});
</script>
