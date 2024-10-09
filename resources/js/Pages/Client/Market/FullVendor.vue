<template>
    <div class="p-6 bg-white shadow-lg rounded-lg max-w-5xl mx-auto"> <!-- Increased max-width -->
        <Link :href="'/dashboard/marketplace'" class="text-blue-600 hover:underline my-6">Back to Marketplace</Link>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ vendor.store_name }}</h2>
        <p class="text-gray-600 mb-2"><strong>Store Email:</strong> {{ vendor.store_email }}</p>
        <p class="text-gray-600 mb-2"><strong>Store Address:</strong> {{ formattedAddress }}</p>
        <p class="text-gray-600 mb-2"><strong>Contact:</strong> {{ formattedContact }}</p>
        <p class="text-gray-600 mb-2"><strong>Category:</strong> {{ vendor.category }}</p>
        <p class="text-gray-600 mb-2"><strong>Price Bracket:</strong> {{ priceBracket }}</p>
        <p class="text-gray-600 mb-2"><strong>Service Area:</strong> {{ vendor.service_area }}</p>

        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800 border-b-2 border-gray-200 pb-2 mb-3">Description</h3>
            <p class="text-gray-700">{{ vendor.description }}</p>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800 border-b-2 border-gray-200 pb-2 mb-3">Image Album</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div v-for="(image, index) in images" :key="index" class="relative cursor-pointer" @click="openModal(index)">
                    <img :src="image" class="w-full h-32 object-cover rounded-lg" alt="Vendor Image" />
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800 border-b-2 border-gray-200 pb-2 mb-3">Bank Details</h3>
            <p class="text-gray-600 mb-1"><strong>Bank Account Number:</strong> {{ vendor.bank_account_number }}</p>
            <p class="text-gray-600 mb-1"><strong>Bank Name:</strong> {{ vendor.bank_name }}</p>
            <p class="text-gray-600 mb-1"><strong>Branch:</strong> {{ vendor.branch }}</p>
            <p class="text-gray-600 mb-1"><strong>Account Name:</strong> {{ vendor.account_name }}</p>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800 border-b-2 border-gray-200 pb-2 mb-3">Online Presence</h3>
            <p class="text-gray-600 mb-1"><strong>Website:</strong> <a :href="vendor.website_url" class="text-blue-600 hover:underline" target="_blank">{{ vendor.website_url }}</a></p>
            <p class="text-gray-600 mb-1"><strong>Facebook:</strong> <a :href="vendor.facebook_link" class="text-blue-600 hover:underline" target="_blank">{{ vendor.facebook_link }}</a></p>
            <p class="text-gray-600 mb-1"><strong>Instagram:</strong> <a :href="vendor.instagram_link" class="text-blue-600 hover:underline" target="_blank">{{ vendor.instagram_link }}</a></p>
        </div>
    </div>

    <div class="flex justify-center space-x-4 mt-6">
        <button
            @click="newContract"
            class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
            Enter Into Contract
        </button>

        <Link
            :href="`/client/message/${vendor.id}`"
            class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
            Send Message
        </Link>
    </div>

    <!-- Modal for Image Preview -->
    <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click.self="closeModal">
        <div class="relative bg-white p-4 rounded-lg">
            <button class="absolute top-2 right-2 text-gray-600" @click="closeModal">✖</button>
            <img :src="currentImage" class="max-w-full max-h-screen" alt="Large Vendor Image" />
            <div class="flex justify-between mt-4">
                <button @click="prevImage" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Previous</button>
                <button @click="nextImage" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Next</button>
            </div>
        </div>
    </div>

    {{ brand_logo}}
    {{gallery}}

</template>

<script setup>
import { defineProps, computed, ref } from 'vue';
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { Link } from '@inertiajs/vue3';
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    vendor: Object
});

const imageLinks = props.vendor.images;
const getImageArray = (links) => {
    const imageArray = [];

    for (let i = 1; i <= 5; i++) {
        const imageKey = `image${i}`;
        if (links[imageKey]) {
            imageArray.push(links[imageKey]);
        }
    }

    return imageArray;
};

const brand_logo = imageLinks.logo;

const images = getImageArray(imageLinks);

const newContract = () => {
    //post request with vendor id to '/client/contract'
    Inertia.post('/contracts', {
        vendor_id: props.vendor.id
    });


};


const formattedContact = computed(() => {
    const contact = props.vendor.contact;
    return contact ? `${contact.name} (${props.vendor.store_contact})` : 'Contact info not available';
});

const formattedAddress = computed(() => {
    try {
        const address = JSON.parse(props.vendor.store_address);
        return `${address.street}, ${address.city}, ${address.district}, ${address.province}`;
    } catch {
        return 'Address not available';
    }
});

const priceBracket = computed(() => {
    switch (props.vendor.price_bracket) {
        case 1:
            return 'Low';
        case 2:
            return 'Medium';
        case 3:
            return 'High';
        default:
            return 'N/A';
    }
});

// Modal state management
const isModalOpen = ref(false);
const currentImageIndex = ref(0);

const openModal = (index) => {
    currentImageIndex.value = index;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

const nextImage = () => {
    currentImageIndex.value = (currentImageIndex.value + 1) % images.length;
};

const prevImage = () => {
    currentImageIndex.value = (currentImageIndex.value - 1 + images.length) % images.length;
};

const currentImage = computed(() => {
    return images[currentImageIndex.value];
});

defineOptions({
    layout: ClientLayout
});
</script>

<style scoped>
/* Add any additional styles here if needed */
</style>
