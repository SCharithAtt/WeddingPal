<template>
    <div class="p-8 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Your Chosen Vendors</h1>

        <div class="flex justify-center mb-6">
            <select v-model="selectedCategory" class="border rounded-md p-2 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Categories</option>
                <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
            </select>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <div
                v-for="vendor in filteredVendors"
                :key="vendor.id"
                class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-102"
            >
                <img :src="vendor.image" alt="Vendor Image" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ vendor.name }}</h2>
                    <p class="text-gray-600">{{ vendor.category }}</p>
                    <p class="mt-2 text-gray-800">{{ vendor.description }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const categories = ['Photographer', 'Florist', 'Caterer', 'DJ', 'Venue'];

const vendors = ref([
    { id: 1, name: 'Jane Doe Photography', category: 'Photographer', description: 'Capturing beautiful moments.', image: 'https://via.placeholder.com/300' },
    { id: 2, name: 'Blossom Florists', category: 'Florist', description: 'Creating stunning floral arrangements.', image: 'https://via.placeholder.com/300' },
    { id: 3, name: 'Gourmet Catering Co.', category: 'Caterer', description: 'Delicious food for your special day.', image: 'https://via.placeholder.com/300' },
    { id: 4, name: 'DJ Party Vibes', category: 'DJ', description: 'Bringing the music to your celebration.', image: 'https://via.placeholder.com/300' },
    { id: 5, name: 'Elegant Events Venue', category: 'Venue', description: 'The perfect place for your wedding.', image: 'https://via.placeholder.com/300' },
]);

const selectedCategory = ref('');

const filteredVendors = computed(() => {
    if (!selectedCategory.value) {
        return vendors.value;
    }
    return vendors.value.filter(vendor => vendor.category === selectedCategory.value);
});
</script>

<style scoped>
/* Add any additional scoped styles here if needed */
</style>
