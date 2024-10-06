<template>
    <div class="p-6">
        <div class="tabs mb-4">
            <button
                v-for="(tab, index) in tabNames"
                :key="index"
                @click="activeTab = index"
                class="mr-2 px-4 py-2 font-semibold text-sm rounded-lg"
                :class="{'bg-blue-500 text-white': activeTab === index, 'bg-gray-200': activeTab !== index}"
            >
                {{ tab }}
            </button>
        </div>

        <div v-if="activeTab === 0">
            <h2 class="text-lg font-bold">Store Information</h2>
            <p><strong>Name:</strong> {{ store_name }}</p>
            <p><strong>Address:</strong> {{ store_address }}</p>
            <p><strong>Email:</strong> {{ store_email }}</p>
            <p><strong>Contact:</strong> {{ store_contact }}</p>
        </div>

        <div v-if="activeTab === 1">
            <h2 class="text-lg font-bold">Business Details</h2>
            <p><strong>Category:</strong> {{ category }}</p>
            <p><strong>Price Bracket:</strong> {{ price_bracket }}</p>
            <p><strong>Service Area:</strong> {{ service_area }}</p>
            <p><strong>Bio:</strong> {{ bio }}</p>
            <p><strong>Description:</strong> {{ description }}</p>
            <p v-if="images.length > 0"><strong>Images:</strong></p>
            <ul>
                <li v-for="(image, idx) in images" :key="idx">{{ image }}</li>
            </ul>
        </div>

        <div v-if="activeTab === 2">
            <h2 class="text-lg font-bold">Bank Information</h2>
            <p><strong>Account Name:</strong> {{ account_name }}</p>
            <p><strong>Bank Name:</strong> {{ bank_name }}</p>
            <p><strong>Branch:</strong> {{ branch }}</p>
            <p><strong>Account Number:</strong> {{ bank_account_number }}</p>
        </div>

        <div v-if="activeTab === 3">
            <h2 class="text-lg font-bold">Additional Information</h2>
            <p><strong>Open Hours:</strong> {{ open_hours }}</p>
            <p><strong>Terms & Conditions:</strong> {{ terms_conditions }}</p>
            <p><strong>Website:</strong> <a :href="website_url" class="text-blue-500" target="_blank">{{ website_url }}</a></p>
            <p><strong>Facebook:</strong> <a :href="facebook_link" class="text-blue-500" target="_blank">{{ facebook_link }}</a></p>
            <p><strong>Instagram:</strong> <a :href="instagram_link" class="text-blue-500" target="_blank">{{ instagram_link }}</a></p>
        </div>
    </div>

</template>

<script setup>
import { ref } from 'vue';

// Props
const props = defineProps({
    store_name: String,
    store_address: String,
    store_email: String,
    store_contact: String,
    category: String,
    price_bracket: String,
    service_area: String,
    bio: String,
    description: String,
    images: {
        type: Array,
        default: () => [],
    },
    bank_account_number: String,
    bank_name: String,
    branch: String,
    account_name: String,
    open_hours: String,
    terms_conditions: String,
    website_url: String,
    facebook_link: String,
    instagram_link: String,
});

// Reactive State
const activeTab = ref(0);
const tabNames = ['Store Information', 'Business Details', 'Bank Information', 'Additional Information'];
</script>

<style scoped>
.tabs {
    display: flex;
}
</style>
