

<template>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">My Disputes</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">Active Disputes</h2>
            <ul class="space-y-4">
                <li class="border rounded-md p-4 bg-gray-50">
                    <div class="flex justify-between">
                        <span class="font-medium">Photographer</span>
                        <span class="text-red-500">Pending</span>
                    </div>
                    <p class="text-gray-700">Issue: <span class="font-medium">Late delivery of photos</span></p>
                    <p class="text-gray-700">Date Filed: <span class="font-medium">September 20, 2024</span></p>
                    <button class="mt-2 text-blue-500 hover:underline" @click="viewDispute('photographer')">View Details</button>
                </li>
                <li class="border rounded-md p-4 bg-gray-50">
                    <div class="flex justify-between">
                        <span class="font-medium">Caterer</span>
                        <span class="text-green-500">Resolved</span>
                    </div>
                    <p class="text-gray-700">Issue: <span class="font-medium">Incorrect food order</span></p>
                    <p class="text-gray-700">Date Filed: <span class="font-medium">August 15, 2024</span></p>
                    <button class="mt-2 text-blue-500 hover:underline" @click="viewDispute('caterer')">View Details</button>
                </li>
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">File a New Dispute</h2>
            <textarea
                class="w-full p-2 border border-gray-300 rounded-md"
                rows="4"
                placeholder="Describe your issue..."
                v-model="newDispute"
            ></textarea>
            <select class="mt-2 w-full p-2 border border-gray-300 rounded-md" v-model="selectedVendor">
                <option value="" disabled>Select Vendor</option>
                <option value="photographer">Photographer</option>
                <option value="caterer">Caterer</option>
                <option value="venue">Venue</option>
            </select>
            <button
                class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                @click="fileDispute"
            >
                File Dispute
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import ClientLayout from "@/Layouts/ClientLayout.vue";

defineOptions({
    layout: ClientLayout
});

const newDispute = ref('');
const selectedVendor = ref('');

const viewDispute = (vendor) => {
    // Logic to view dispute details
    console.log(`Viewing dispute for ${vendor}`);
};

const fileDispute = () => {
    // Logic to handle filing a new dispute
    if (newDispute.value && selectedVendor.value) {
        console.log(`Filing dispute for ${selectedVendor.value}: ${newDispute.value}`);
        // Add API call logic here to save the dispute
        newDispute.value = ''; // Clear the input after filing
        selectedVendor.value = ''; // Reset the selected vendor
    } else {
        alert('Please fill in all fields.');
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
