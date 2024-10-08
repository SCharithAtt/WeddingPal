

<template>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Vendor Contracts</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">Active Contracts</h2>
            <ul class="list-disc pl-5 space-y-2">
                <li class="border rounded-md p-4 bg-gray-50">
                    <div class="flex justify-between">
                        <span class="font-medium">Photographer</span>
                        <span class="text-gray-500">Active</span>
                    </div>
                    <p class="text-gray-700">Contract Amount: <span class="font-medium">$2,000</span></p>
                    <p class="text-gray-700">Due Date: <span class="font-medium">March 1, 2025</span></p>
                    <button class="mt-2 text-blue-500 hover:underline" @click="viewContract('photographer')">View
                        Contract
                    </button>
                </li>
                <li class="border rounded-md p-4 bg-gray-50">
                    <div class="flex justify-between">
                        <span class="font-medium">Caterer</span>
                        <span class="text-gray-500">Active</span>
                    </div>
                    <p class="text-gray-700">Contract Amount: <span class="font-medium">$8,000</span></p>
                    <p class="text-gray-700">Due Date: <span class="font-medium">April 15, 2025</span></p>
                    <button class="mt-2 text-blue-500 hover:underline" @click="viewContract('caterer')">View Contract
                    </button>
                </li>
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">Upload New Contract</h2>
            <input
                type="file"
                class="mb-4 p-2 border border-gray-300 rounded-md"
                @change="handleFileUpload"
            />
            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Upload Contract
            </button>
        </div>
    </div>
</template>

<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";

defineOptions({
    layout: ClientLayout
});

const viewContract = (vendor) => {
    // Logic to view contract, such as opening a modal or navigating to a contract page
    console.log(`Viewing contract for ${vendor}`);
};

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        // Logic to handle the file upload
        console.log(`Uploading file: ${file.name}`);
        // You could add API call logic here to save the contract
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
