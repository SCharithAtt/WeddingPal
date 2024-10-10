<template>
    <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col md:flex-row items-center">
        <div class="w-full md:w-1/3">
            <div class="relative">
                <img
                    :src="currentImage"
                    @mouseover="hoverImage"
                    @mouseleave="resetImage"
                    class="w-full h-2/3 object-cover rounded-lg"
                    alt="Vendor Image"
                />
            </div>
        </div>
        <div class="w-full md:w-2/3 md:pl-4 mt-4 md:mt-0 ">
            <h3 class="text-lg font-semibold text-gray-800">{{ vendor.store_name }}</h3>
            <p class="text-gray-600 my-3"><strong>Category:</strong> {{ vendor.category }}</p>
            <p class="text-gray-600 my-3"><strong>Contact Person:</strong> {{ formattedContact }}</p>
            <p class="text-gray-600 my-3"><strong>Service Area:</strong> {{ serviceArea }}</p>
            <p class="text-gray-600 my-3"><strong>Price Bracket:</strong> {{ priceBracket }}</p>
            <Link
                :href="`/vendor/show/${vendor.id}`"
                class="mt-4 bg-blue-500 text-white py-2 px-4 rounded transition hover:bg-blue-600"
            >
                View Details
            </Link>
        </div>
    </div>
</template>

<script setup>
import { defineProps, toRefs, computed, ref } from 'vue';
import { Link } from '@inertiajs/vue3';

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
const { vendor } = toRefs(props);

// Placeholder Image URLs
const image1 = ref(images[0] || 'https://via.placeholder.com/300x200.png?text=Image+1');
const image2 = ref(images[1] || 'https://via.placeholder.com/300x200.png?text=Image+2');

const currentImage = ref(image1.value); // Track current image

const formattedContact = computed(() => {
    const contact = JSON.parse(vendor.value.store_contact);
    return `${contact.name} (${contact.number})` || 'N/A';
});

const priceBracket = computed(() => {
    switch (vendor.value.price_bracket) {
        case 1:
            return '$';
        case 2:
            return '$$';
        case 3:
            return '$$$';
        default:
            return 'N/A';
    }
});

const serviceArea = computed(() => {
    const address = JSON.parse(vendor.value.store_address);

    switch (vendor.value.service_area) {
        case 'Island wide':
            return 'Island Wide';
        case 'District':
            return address.district || 'N/A'; // Return District from address
        case 'Province':
            return address.province || 'N/A'; // Return Province from address
        default:
            return 'N/A';
    }
});

// Methods to handle image switching
const hoverImage = () => {
    currentImage.value = image2.value; // Switch to hover image
};

const resetImage = () => {
    currentImage.value = image1.value; // Switch back to original image
};

</script>

<style scoped>
/* Add any additional styles here if needed */
</style>
