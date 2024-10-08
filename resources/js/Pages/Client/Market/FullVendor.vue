<template>
    <div class="p-4 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold">{{ vendor.store_name }}</h2>
        <p><strong>Store Email:</strong> {{ vendor.store_email }}</p>
        <p><strong>Store Address:</strong> {{ formattedAddress }}</p>
        <p><strong>Contact:</strong> {{ formattedContact }}</p>
        <p><strong>Category:</strong> {{ vendor.category }}</p>
        <p><strong>Price Bracket:</strong> {{ priceBracket }}</p>
        <p><strong>Service Area:</strong> {{ vendor.service_area }}</p>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Description</h3>
            <p>{{ vendor.description }}</p>
        </div>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Bank Details</h3>
            <p><strong>Bank Account Number:</strong> {{ vendor.bank_account_number }}</p>
            <p><strong>Bank Name:</strong> {{ vendor.bank_name }}</p>
            <p><strong>Branch:</strong> {{ vendor.branch }}</p>
            <p><strong>Account Name:</strong> {{ vendor.account_name }}</p>
        </div>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Online Presence</h3>
            <p><strong>Website:</strong> <a :href="vendor.website_url" class="text-blue-600" target="_blank">{{ vendor.website_url }}</a></p>
            <p><strong>Facebook:</strong> <a :href="vendor.facebook_link" class="text-blue-600" target="_blank">{{ vendor.facebook_link }}</a></p>
            <p><strong>Instagram:</strong> <a :href="vendor.instagram_link" class="text-blue-600" target="_blank">{{ vendor.instagram_link }}</a></p>
        </div>
    </div>
</template>

<script setup>
import { defineProps, computed } from 'vue';

const props = defineProps({
    vendor: Object
});

const formattedContact = computed(() => {
    return `${vendor.value.contact.name} (${vendor.value.store_contact})`;
});

const formattedAddress = computed(() => {
    const address = JSON.parse(vendor.value.store_address);
    return `${address.street}, ${address.city}, ${address.district}, ${address.province}`;
});

const priceBracket = computed(() => {
    switch (vendor.value.price_bracket) {
        case 1: return 'Low';
        case 2: return 'Medium';
        case 3: return 'High';
        default: return 'N/A';
    }
});
</script>
