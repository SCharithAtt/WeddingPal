<script setup>
import { ref } from 'vue';
import VendorLayout from "@/Layouts/VendorLayout.vue";
import VendorStoreInfo from "@/Pages/Vendor/Store/VendorStoreInfo.vue";
import CursiveWriting from "@/Components/CursiveWriting.vue";

defineOptions({
    layout: VendorLayout,
});

// Initialize reactive variables
const totalClientRequests = ref(0);
const currentUndertakings = ref(0);
const storeViews = ref(0);
</script>

<template>
    <div class="dashboard-container">
        <CursiveWriting
            header="Welcome to Your Dashboard"
            text="Here you can easily manage your store, view your current undertakings, and communicate with clients."
        />
    </div>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Analytics This Month</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="analytics-card bg-blue-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-lg font-semibold">Total Client Requests</h3>
                <p class="text-3xl font-bold">{{ totalClientRequests }}</p>
            </div>
            <div class="analytics-card bg-yellow-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-lg font-semibold">Current Undertakings</h3>
                <p class="text-3xl font-bold">{{ currentUndertakings }}</p>
            </div>
            <div class="analytics-card bg-green-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-lg font-semibold">Store Views</h3>
                <p class="text-3xl font-bold">{{ storeViews }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.dashboard-container {
    background-color: #f9fafb; /* Light background for a soft look */
    padding: 2rem; /* Generous padding for a spacious feel */
    border-radius: 12px; /* Rounded corners for elegance */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    max-width: 800px; /* Limit width for better readability */
    margin: 2rem auto; /* Centering the container */
}

h1 {
    font-size: 2.5rem; /* Large font size for the header */
    font-weight: 700; /* Bold weight for emphasis */
    color: #1f2937; /* Dark color for contrast */
    margin-bottom: 1rem; /* Space below the header */
}

.analytics-card {
    transition: transform 0.2s;
}

.analytics-card:hover {
    transform: translateY(-2px); /* Lift effect on hover */
}

p {
    font-size: 1.125rem; /* Slightly larger font for the paragraph */
    color: #4b5563; /* Grayish color for softer readability */
    line-height: 1.6; /* Better line height for readability */
}

.cursive-writing {
    text-align: center; /* Centering the text for a balanced layout */
}

.cursive-writing h1 {
    font-family: 'Cursive', sans-serif; /* Cursive font for header */
    margin-bottom: 0.5rem; /* Spacing between header and text */
    color: #4a5568; /* Soft dark color for the header */
}

.cursive-writing p {
    margin: 0; /* Remove default margin */
    padding: 0; /* Remove default padding */
    color: #4b5563; /* Soft gray color */
}
</style>
