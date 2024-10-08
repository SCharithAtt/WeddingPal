<template>
    <div class="p-4 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold">Vendor Information</h2>
        <p class="mt-2"><strong>Store Name:</strong> {{ vendor.store_name }}</p>
        <p><strong>Store Email:</strong> {{ vendor.store_email }}</p>
        <p><strong>Store Address:</strong> {{ formattedAddress }}</p>
        <p><strong>Store Contact:</strong> {{ vendor.store_contact }}</p>
        <p><strong>Category:</strong> {{ vendor.category }}</p>
        <p><strong>Price Bracket:</strong> {{ vendor.price_bracket }}</p>
        <p><strong>Service Area:</strong> {{ vendor.service_area }}</p>
        <p><strong>Bio:</strong> {{ vendor.bio }}</p>
        <p><strong>Description:</strong> {{ vendor.description }}</p>
        <p><strong>Website URL:</strong> {{ vendor.website_url }}</p>
        <p><strong>Social Links:</strong> Facebook: {{ vendor.facebook_link }}, Instagram: {{ vendor.instagram_link }}</p>
        <button @click="openEditModal" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Edit</button>

        <div v-if="isEditing" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click="closeModal">
            <div class="bg-white rounded-lg shadow-lg p-4 w-3/4 max-w-2xl" @click.stop>
                <button @click="closeModal" class="absolute top-2 right-2 text-gray-600">✖</button>
                <h3 class="text-lg font-semibold">Edit Vendor Info</h3>
                <form @submit.prevent="updateVendor" class="max-h-96 overflow-auto">
                    <!-- All input fields go here, same as before -->
                    <div>
                        <label class="block">Store Name:</label>
                        <input v-model="editedVendor.store_name" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Store Email:</label>
                        <input v-model="editedVendor.store_email" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Store Address:</label>
                        <input v-model="editedVendor.store_address" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Store Contact:</label>
                        <input v-model="editedVendor.store_contact" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Category:</label>
                        <input v-model="editedVendor.category" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Price Bracket:</label>
                        <input v-model="editedVendor.price_bracket" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Service Area:</label>
                        <input v-model="editedVendor.service_area" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Bio:</label>
                        <textarea v-model="editedVendor.bio" class="mt-1 block w-full border border-gray-300 rounded p-2"></textarea>
                    </div>
                    <div class="mt-4">
                        <label class="block">Description:</label>
                        <textarea v-model="editedVendor.description" class="mt-1 block w-full border border-gray-300 rounded p-2"></textarea>
                    </div>
                    <div class="mt-4">
                        <label class="block">Bank Account Number:</label>
                        <input v-model="editedVendor.bank_account_number" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Bank Name:</label>
                        <input v-model="editedVendor.bank_name" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Branch:</label>
                        <input v-model="editedVendor.branch" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Account Name:</label>
                        <input v-model="editedVendor.account_name" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Open Hours:</label>
                        <input v-model="editedVendor.open_hours" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Terms & Conditions:</label>
                        <textarea v-model="editedVendor.terms_conditions" class="mt-1 block w-full border border-gray-300 rounded p-2"></textarea>
                    </div>
                    <div class="mt-4">
                        <label class="block">Images (JSON format):</label>
                        <textarea v-model="editedVendor.images" class="mt-1 block w-full border border-gray-300 rounded p-2"></textarea>
                    </div>
                    <div class="mt-4">
                        <label class="block">Website URL:</label>
                        <input v-model="editedVendor.website_url" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Facebook Link:</label>
                        <input v-model="editedVendor.facebook_link" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block">Instagram Link:</label>
                        <input v-model="editedVendor.instagram_link" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    </div>
                    <button type="submit" class="mt-4 bg-green-500 text-white py-2 px-4 rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, toRefs, computed } from 'vue';
import { defineProps } from 'vue';
import VendorLayout from "@/Layouts/VendorLayout.vue";

const props = defineProps({
    vendor: Object
});

const { vendor } = toRefs(props);
const isEditing = ref(false);
const editedVendor = ref({ ...vendor.value });

const openEditModal = () => {
    editedVendor.value = { ...vendor.value }; // Reset to original vendor info
    isEditing.value = true;
};

const closeModal = () => {
    isEditing.value = false;
};

const updateVendor = () => {
    // Add your update logic here, e.g., API call
    console.log('Updated vendor:', editedVendor.value);
    closeModal();
};

const formattedAddress = computed(() => {
    const address = JSON.parse(vendor.value.store_address);
    return `${address.street}, ${address.city}, ${address.district}, ${address.province}`;
});

defineOptions({
    layout : VendorLayout,
});
</script>

