<template>
    <div class="bg-white shadow-md rounded-lg p-4 flex flex-col">
        <h3 class="text-lg font-semibold">{{ vendor.store_name }}</h3>
        <p><strong>Category:</strong> {{ vendor.category }}</p>
        <p><strong>Contact Person:</strong> {{ formattedContact }}</p>
        <p><strong>Service Area:</strong> {{ serviceArea }}</p>
        <p><strong>Price Bracket:</strong> {{ priceBracket }}</p>
        <button @click="viewDetails" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">View Details</button>
    </div>
</template>

<script setup>
import { defineProps, toRefs, computed } from 'vue';

const props = defineProps({
    vendor: Object
});

const { vendor } = toRefs(props);

const formattedContact = computed(() => {
    //take vendor.store_contact and parse to JSON
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


const viewDetails = () => {
    // Emit event or trigger navigation to view the full vendor profile
    console.log('View details for:', vendor.value);
};
</script>
