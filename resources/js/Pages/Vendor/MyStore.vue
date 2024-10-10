<template>
    <div class="p-6 bg-gradient-to-r from-blue-50 to-blue-100 shadow-lg rounded-lg m-6">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Vendor Information</h2>

        <div class="mt-6 border-t border-gray-300 pt-4">
            <h3 class="text-xl font-semibold text-gray-700">General Information</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                <p><strong>Store Name:</strong> <span class="text-gray-600">{{ vendor.store_name }}</span></p>
                <p><strong>Store Email:</strong> <span class="text-gray-600">{{ vendor.store_email }}</span></p>
                <p><strong>Store Address:</strong> <span class="text-gray-600">{{ formattedAddress }}</span></p>
                <p><strong>Store Contact:</strong> <span class="text-gray-600">{{ vendor.store_contact }}</span></p>
                <p><strong>Category:</strong> <span class="text-gray-600">{{ vendor.category }}</span></p>
                <p><strong>Price Bracket:</strong> <span class="text-gray-600">{{ vendor.price_bracket }}</span></p>
                <p><strong>Service Area:</strong> <span class="text-gray-600">{{ vendor.service_area }}</span></p>
            </div>
        </div>

        <div class="mt-6 border-t border-gray-300 pt-4">
            <h3 class="text-xl font-semibold text-gray-700">Description</h3>
            <p><strong>Bio:</strong> <span class="text-gray-600">{{ vendor.bio }}</span></p>
            <p><strong>Description:</strong> <span class="text-gray-600">{{ vendor.description }}</span></p>
        </div>

        <div class="mt-6 border-t border-gray-300 pt-4">
            <h3 class="text-xl font-semibold text-gray-700">Bank Details</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                <p><strong>Bank Account Number:</strong> <span class="text-gray-600">{{ vendor.bank_account_number }}</span></p>
                <p><strong>Bank Name:</strong> <span class="text-gray-600">{{ vendor.bank_name }}</span></p>
                <p><strong>Branch:</strong> <span class="text-gray-600">{{ vendor.branch }}</span></p>
                <p><strong>Account Name:</strong> <span class="text-gray-600">{{ vendor.account_name }}</span></p>
            </div>
        </div>

        <div class="mt-6 border-t border-gray-300 pt-4">
            <h3 class="text-xl font-semibold text-gray-700">Operating Hours</h3>
            <p v-if="vendor.open_hours" class="text-gray-600">{{ vendor.open_hours }}</p>
            <p v-else class="text-gray-600">No operating hours specified.</p>
        </div>

        <div class="mt-6 border-t border-gray-300 pt-4">
            <h3 class="text-xl font-semibold text-gray-700">Terms & Conditions</h3>
            <p class="text-gray-600">{{ vendor.terms_conditions }}</p>
        </div>

        <div class="mt-6 border-t border-gray-300 pt-4">
            <h3 class="text-xl font-semibold text-gray-700">Online Presence</h3>
            <div class="flex flex-col space-y-2">
                <p><strong>Website URL:</strong> <a :href="vendor.website_url" class="text-blue-600 hover:underline" target="_blank">{{ vendor.website_url }}</a></p>
                <p><strong>Facebook Link:</strong> <a :href="vendor.facebook_link" class="text-blue-600 hover:underline" target="_blank">{{ vendor.facebook_link }}</a></p>
                <p><strong>Instagram Link:</strong> <a :href="vendor.instagram_link" class="text-blue-600 hover:underline" target="_blank">{{ vendor.instagram_link }}</a></p>
            </div>
        </div>

        <button @click="openEditModal" class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Edit</button>

        <div v-if="isEditing" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click="closeModal">
            <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-2/3 lg:w-1/2" @click.stop>
                <button @click="closeModal" class="absolute top-3 right-3 text-gray-600 hover:text-gray-800 transition">✖</button>
                <h3 class="text-xl font-semibold text-gray-800 text-center">Edit Vendor Info</h3>
                <form @submit.prevent="updateVendor" class="mt-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-gray-600">Store Name:</label>
                            <input v-model="editedVendor.store_name" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Store Email:</label>
                            <input v-model="editedVendor.store_email" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Store Address:</label>
                            <input v-model="editedVendor.store_address" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Store Contact:</label>
                            <input v-model="editedVendor.store_contact" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Category:</label>
                            <input v-model="editedVendor.category" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Price Bracket:</label>
                            <input v-model="editedVendor.price_bracket" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Service Area:</label>
                            <input v-model="editedVendor.service_area" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Bio:</label>
                            <textarea v-model="editedVendor.bio" class="mt-1 block w-full border border-gray-300 rounded p-2" rows="3"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-600">Description:</label>
                            <textarea v-model="editedVendor.description" class="mt-1 block w-full border border-gray-300 rounded p-2" rows="3"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-600">Bank Account Number:</label>
                            <input v-model="editedVendor.bank_account_number" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Bank Name:</label>
                            <input v-model="editedVendor.bank_name" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Branch:</label>
                            <input v-model="editedVendor.branch" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Account Name:</label>
                            <input v-model="editedVendor.account_name" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Open Hours:</label>
                            <input v-model="editedVendor.open_hours" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Terms & Conditions:</label>
                            <textarea v-model="editedVendor.terms_conditions" class="mt-1 block w-full border border-gray-300 rounded p-2" rows="3"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-600">Images (JSON format):</label>
                            <textarea v-model="editedVendor.images" class="mt-1 block w-full border border-gray-300 rounded p-2" rows="3"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-600">Website URL:</label>
                            <input v-model="editedVendor.website_url" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Facebook Link:</label>
                            <input v-model="editedVendor.facebook_link" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-600">Instagram Link:</label>
                            <input v-model="editedVendor.instagram_link" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                        </div>
                    </div>
                    <button type="submit" class="mt-6 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-8 text-center">
        <h1 class="text-2xl font-semibold text-gray-800">This is how your store is listed</h1>
        <VendorSummary :vendor="vendor" />
    </div>

    <div class="mt-8 text-center">
        <h1 class="text-2xl font-semibold text-gray-800">This is how your Store's full page looks</h1>
        <FullVendor :vendor="vendor" />
    </div>
</template>

<script setup>
import { ref, toRefs, computed } from 'vue';
import { defineProps } from 'vue';
import VendorLayout from "@/Layouts/VendorLayout.vue";
import VendorSummary from "@/Pages/Client/Market/VendorSummary.vue";
import FullVendor from "@/Pages/Client/Market/FullVendor.vue";

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
    layout: VendorLayout,
});
</script>

<style>
body {
    font-family: 'Arial', sans-serif;
}
</style>
