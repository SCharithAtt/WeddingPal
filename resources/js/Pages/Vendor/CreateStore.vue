<template>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Register Your Store</h2>
        <form @submit.prevent="submitForm" class="space-y-4">
            <div>
                <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name</label>
                <input
                    v-model="form.store_name"
                    type="text"
                    id="store_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                <input
                    v-model="form.store_address.street"
                    type="text"
                    id="street"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input
                    v-model="form.store_address.city"
                    type="text"
                    id="city"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                <input
                    v-model="form.store_address.district"
                    type="text"
                    id="district"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                <input
                    v-model="form.store_address.province"
                    type="text"
                    id="province"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="store_email" class="block text-sm font-medium text-gray-700">Store Email</label>
                <input
                    v-model="form.store_email"
                    type="email"
                    id="store_email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="store_contact" class="block text-sm font-medium text-gray-700">Contact Person Name</label>
                <input
                    v-model="form.store_contact.name"
                    type="text"
                    id="store_contact"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input
                    v-model="form.store_contact.number"
                    type="text"
                    id="contact_number"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="store_general_number" class="block text-sm font-medium text-gray-700">Store General Number</label>
                <input
                    v-model="form.store_general_number"
                    type="text"
                    id="store_general_number"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input
                    v-model="form.category"
                    type="text"
                    id="category"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="price_bracket" class="block text-sm font-medium text-gray-700">Price Bracket (1-3)</label>
                <select
                    v-model="form.price_bracket"
                    id="price_bracket"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                >
                    <option value="" disabled>Select Price Bracket</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div>
                <label for="service_area" class="block text-sm font-medium text-gray-700">Service Area</label>
                <select
                    v-model="form.service_area"
                    id="service_area"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                >
                    <option value="" disabled>Select Service Area</option>
                    <option value="Island wide">Island wide</option>
                    <option value="District">District</option>
                    <option value="Province">Province</option>
                </select>
            </div>

            <div>
                <label for="open_hour" class="block text-sm font-medium text-gray-700">Opening Hour</label>
                <input
                    v-model="form.openHour"
                    type="time"
                    id="open_hour"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="close_hour" class="block text-sm font-medium text-gray-700">Closing Hour</label>
                <input
                    v-model="form.closeHour"
                    type="time"
                    id="close_hour"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="open_days" class="block text-sm font-medium text-gray-700">Open Days</label>
                <select
                    v-model="form.openDays"
                    id="open_days"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                >
                    <option value="" disabled>Select Open Days</option>
                    <option value="Weekdays">Weekdays</option>
                    <option value="Everyday">Everyday</option>
                </select>
            </div>

            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea
                    v-model="form.bio"
                    id="bio"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    rows="3"
                ></textarea>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    v-model="form.description"
                    id="description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    rows="3"
                ></textarea>
            </div>

            <div>
                <label for="bank_account_number" class="block text-sm font-medium text-gray-700">Bank Account Number</label>
                <input
                    v-model="form.bank_account_number"
                    type="text"
                    id="bank_account_number"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name</label>
                <input
                    v-model="form.bank_name"
                    type="text"
                    id="bank_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="branch" class="block text-sm font-medium text-gray-700">Branch</label>
                <input
                    v-model="form.branch"
                    type="text"
                    id="branch"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                <input
                    v-model="form.account_name"
                    type="text"
                    id="account_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <button
                type="submit"
                class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200"
            >
                Register Store
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import VendorLayout from "@/Layouts/VendorLayout.vue";

const form = ref({
    store_name: '',
    store_address: {
        street: '',
        city: '',
        district: '',
        province: '',
    },
    store_email: '',
    store_contact: {
        name: '',
        number: '',
    },
    store_general_number: '',
    category: '',
    price_bracket: '',
    service_area: '',
    openHour: '',
    closeHour: '',
    openDays: '',
    bio: '',
    description: '',
    bank_account_number: '',
    bank_name: '',
    branch: '',
    account_name: '',
});

const submitForm = () => {
    // Convert store_address and store_contact to JSON strings
    const submissionData = {
        ...form.value,
        store_address: JSON.stringify(form.value.store_address),
        store_contact: JSON.stringify(form.value.store_contact),
    };

    Inertia.post('/vendor', submissionData, {
        onFinish: () => {
            // Reset the form or handle post-submit logic
            Object.keys(form.value).forEach(key => {
                if (typeof form.value[key] === 'object') {
                    Object.keys(form.value[key]).forEach(innerKey => {
                        form.value[key][innerKey] = '';
                    });
                } else {
                    form.value[key] = '';
                }
            });
        }
    });
};

defineOptions({
    layout: VendorLayout,
});
</script>
