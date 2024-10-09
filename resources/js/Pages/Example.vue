<template>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Vendor List</h1>

        <div class="flex mb-4">
            <select v-model="selectedCategory" @change="fetchVendors()" class="border border-gray-300 rounded p-2">
                <option value="">All Categories</option>
                <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
            </select>

            <select v-model="perPage" @change="fetchVendors()" class="ml-4 border border-gray-300 rounded p-2">
                <option value="5">5 per page</option>
                <option value="10">10 per page</option>
                <option value="20">20 per page</option>
                <option value="25" selected>25 per page</option>
            </select>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <VendorSummary
                v-for="vendor in vendors?.data || []"
                :key="vendor.id"
                :vendor="vendor"
            />
        </div>

        <div class="mt-4" v-if="vendors">
            <button @click="changePage(vendors.current_page - 1)" :disabled="vendors.current_page === 1" class="mr-2 bg-gray-300 rounded p-2">Previous</button>
            <span>Page {{ vendors.current_page }} of {{ vendors.last_page }}</span>
            <button @click="changePage(vendors.current_page + 1)" :disabled="vendors.current_page === vendors.last_page" class="ml-2 bg-gray-300 rounded p-2">Next</button>
        </div>

        <div v-if="loading" class="mt-4">Loading vendors...</div>
        <div v-if="error" class="mt-4 text-red-600">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, defineProps } from 'vue';
import VendorSummary from '@/Pages/Client/Market/VendorSummary.vue';
import ClientLayout from "@/Layouts/ClientLayout.vue";

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
    vendors: {
        type: Object,
        required: true,
    },
});

const selectedCategory = ref('');
const perPage = ref('25'); // Default items per page
const vendors = ref(props.vendors); // Use vendors passed via props
const loading = ref(false);
const error = ref('');

// Function to fetch vendors with optional pagination
const fetchVendors = (page = 1) => {
    loading.value = true;
    error.value = '';

    fetch(`api/display-vendors?category=${selectedCategory.value}&per_page=${perPage.value}&page=${page}`)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            vendors.value = data; // Directly assign the JSON response
            loading.value = false;
        })
        .catch(err => {
            error.value = 'Failed to load vendors. Please try again.';
            loading.value = false;
        });
};

// Function to change the page
const changePage = (page) => {
    if (page >= 1 && vendors.value && page <= vendors.value.last_page) {
        fetchVendors(page); // Pass the page number to fetchVendors
    }
};

// Fetch initial data on mount
fetchVendors(); // No page argument needed for initial load


defineOptions({
    layout : ClientLayout,
});
</script>

<style scoped>
.container {
    max-width: 1200px;
}
</style>
