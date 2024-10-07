<template>
    <div>
        <div class="flex flex-col mb-4">
            <label for="category" class="font-semibold">Filter by Category:</label>
            <select id="category" v-model="selectedCategory" @change="filterVendors" class="mt-1 p-2 border rounded">
                <option value="">All Categories</option>
                <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
            </select>
        </div>

        <div class="flex flex-col mb-4">
            <label for="sort" class="font-semibold">Sort by:</label>
            <select id="sort" v-model="sortOrder" @change="sortVendors" class="mt-1 p-2 border rounded">
                <option value="name">Name</option>
                <option value="summary">Summary</option>
            </select>
        </div>

        <div v-if="selectedCategory === ''" class="space-y-8">
            <div v-for="category in categories" :key="category">
                <h2 class="text-2xl font-bold mb-4">{{ category }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div v-for="vendor in getVendorsByCategory(category)" :key="vendor.id" class="vendor-tile group">
                        <div class="relative">
                            <img :src="vendor.image_1" alt="Vendor Image" class="w-full h-48 object-cover transition-opacity duration-300 group-hover:opacity-0">
                            <img :src="vendor.image_2" alt="Vendor Hover Image" class="absolute inset-0 w-full h-48 object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                            <div class="absolute bottom-0 bg-white bg-opacity-75 p-4">
                                <h3 class="text-lg font-semibold">{{ vendor.name }}</h3>
                                <p>{{ vendor.summary }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div v-for="vendor in filteredVendors" :key="vendor.id" class="vendor-tile group">
                <div class="relative">
                    <img :src="vendor.image_1" alt="Vendor Image" class="w-full h-48 object-cover transition-opacity duration-300 group-hover:opacity-0">
                    <img :src="vendor.image_2" alt="Vendor Hover Image" class="absolute inset-0 w-full h-48 object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                    <div class="absolute bottom-0 bg-white bg-opacity-75 p-4">
                        <h3 class="text-lg font-semibold">{{ vendor.name }}</h3>
                        <p>{{ vendor.summary }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button v-if="vendors.prev_page_url" @click="fetchVendors(vendors.prev_page_url)">Previous</button>
            <button v-if="vendors.next_page_url" @click="fetchVendors(vendors.next_page_url)">Next</button>
        </div>
    </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';

export default {
    setup() {
        const vendors = ref({
            data: [
                { id: 1, name: 'Elegant Florists', category: 'Floral', image_1: 'https://via.placeholder.com/300?text=Florist+1', image_2: 'https://via.placeholder.com/300?text=Florist+Hover', summary: 'Beautiful floral arrangements for your special day.' },
                { id: 2, name: 'Charming Caterers', category: 'Catering', image_1: 'https://via.placeholder.com/300?text=Caterer+1', image_2: 'https://via.placeholder.com/300?text=Caterer+Hover', summary: 'Delicious food to delight your guests.' },
                { id: 3, name: 'Glamorous Photographers', category: 'Photography', image_1: 'https://via.placeholder.com/300?text=Photographer+1', image_2: 'https://via.placeholder.com/300?text=Photographer+Hover', summary: 'Capturing every moment of your love story.' },
                { id: 4, name: 'Stylish Venues', category: 'Venue', image_1: 'https://via.placeholder.com/300?text=Venue+1', image_2: 'https://via.placeholder.com/300?text=Venue+Hover', summary: 'Stunning locations for your wedding.' },
                { id: 5, name: 'Classic DJs', category: 'Music', image_1: 'https://via.placeholder.com/300?text=DJ+1', image_2: 'https://via.placeholder.com/300?text=DJ+Hover', summary: 'Great music to keep your party going.' },
                { id: 6, name: 'Memorable Decor', category: 'Decor', image_1: 'https://via.placeholder.com/300?text=Decor+1', image_2: 'https://via.placeholder.com/300?text=Decor+Hover', summary: 'Transform your venue into a magical place.' },
            ],
            prev_page_url: null,
            next_page_url: null,
        });

        const categories = ref(['Floral', 'Catering', 'Photography', 'Venue', 'Music', 'Decor']);
        const selectedCategory = ref('');
        const sortOrder = ref('name');

        const filteredVendors = computed(() => {
            let filtered = vendors.value.data;

            // Filter by selected category
            if (selectedCategory.value) {
                filtered = filtered.filter(vendor => vendor.category === selectedCategory.value);
            }

            // Sort vendors
            filtered.sort((a, b) => {
                if (sortOrder.value === 'name') {
                    return a.name.localeCompare(b.name);
                } else if (sortOrder.value === 'summary') {
                    return a.summary.localeCompare(b.summary);
                }
                return 0;
            });

            return filtered;
        });

        const getVendorsByCategory = (category) => {
            return vendors.value.data.filter(vendor => vendor.category === category);
        };

        const fetchVendors = async (url = null) => {
            // Normally you would fetch data from an API
            if (url) {
                // Implement your pagination logic if needed
            } else {
                // Reset to initial data for demonstration
                // No need for API call in this dummy data setup
            }
        };

        onMounted(() => {
            fetchVendors();
        });

        const filterVendors = () => {
            // This will automatically update filteredVendors due to computed property
        };

        const sortVendors = () => {
            // This will automatically update filteredVendors due to computed property
        };

        return { vendors, filteredVendors, categories, selectedCategory, sortOrder, fetchVendors, filterVendors, sortVendors, getVendorsByCategory };
    }
};
</script>

<style scoped>
.vendor-tile {
    position: relative;
    overflow: hidden;
    border-radius: 0.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
</style>
