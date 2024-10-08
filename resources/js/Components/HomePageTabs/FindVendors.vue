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
                { id: 1, name: 'Elegant Florists', category: 'Floral', image_1: 'https://www.everlastinglanka.com/wp-content/uploads/2022/08/flower1.webp', image_2: 'https://cdn0.hitched.co.uk/article/5363/3_2/960/jpg/73635-march-hare-floral-design.jpeg', summary: 'Beautiful floral arrangements for your special day.' },
                { id: 2, name: 'Charming Caterers', category: 'Catering', image_1: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmJVYIe2gEkf1ARvH_Kd3xtvCXn4HV4awfmg&s', image_2: 'https://www.sunjaya.com.my/wp-content/uploads/2019/11/Wedding-Catering-Fusion.jpg', summary: 'Delicious food to delight your guests.' },
                { id: 3, name: 'Glamorous Photographers', category: 'Photography', image_1: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkldVMteI-5T56-zZwUS-YjKad17LaxRf1HQ&s', image_2: 'https://rangefinderonline.com/wp-content/uploads/2024/03/BODY-2-Derrel-Ho-Shing-copy.jpg', summary: 'Capturing every moment of your love story.' },
                { id: 4, name: 'Ritz Carlton', category: 'Venue', image_1: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6oXw-YJ8Uxpqw-z9G7WSvpAj-uyp5lbcgkQ&s', image_2: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu3NK1vbTUTxy3k2N7fdby0Y0KVaOvvYFKDA&s', summary: 'Stunning locations for your wedding.' },
                { id: 5, name: 'Classic DJs', category: 'Music', image_1: 'https://images.squarespace-cdn.com/content/v1/5c2585fbd274cb386addb020/1624473508882-O68ZBIPYRKLJHYG9GPFG/zane-persaud-F_2bqTZ0Vl0-unsplash.jpg', image_2: 'https://oneabovedj.com/wp-content/uploads/2022/02/party-time-squashed.jpg', summary: 'Great music to keep your party going.' },
                { id: 6, name: 'Memorable Decor', category: 'Decor', image_1: 'https://www.brides.com/thmb/YmbgQGVP72ox-iL3wARX2BvY6Kc=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__brides__proteus__5bb64a4ab2e7ef506361bb51__11-57fb9d6a4fbb4a43a0cad00bcc7fb6c9.jpeg', image_2: 'https://www.lolavalentina.com/wp-content/uploads/2022/11/Lola_Minimalist-Blog-2.jpg', summary: 'Transform your venue into a magical place.' },
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
