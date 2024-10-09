<template>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Register Your Store</h2>
        <form @submit.prevent="submitForm" class="space-y-4">
            <div>
                <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name</label>
                <input
                    type="text"
                    id="store_name"
                    name="store_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                <input
                    type="text"
                    id="street"
                    name="street"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input
                    type="text"
                    id="city"
                    name="city"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                <input
                    type="text"
                    id="district"
                    name="district"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                <input
                    type="text"
                    id="province"
                    name="province"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="store_email" class="block text-sm font-medium text-gray-700">Store Email</label>
                <input
                    type="email"
                    id="store_email"
                    name="store_email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="store_contact" class="block text-sm font-medium text-gray-700">Contact Person Name</label>
                <input
                    type="text"
                    id="store_contact"
                    name="store_contact"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input
                    type="text"
                    id="contact_number"
                    name="contact_number"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="store_general_number" class="block text-sm font-medium text-gray-700">Store General Number</label>
                <input
                    type="text"
                    id="store_general_number"
                    name="store_general_number"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select
                    id="category"
                    name="category"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                >
                    <option value="" disabled>Select a category</option>
                    <option v-for="(category, index) in categories" :key="index" :value="category">
                        {{ category }}
                    </option>
                </select>
            </div>

            <div>
                <label for="price_bracket" class="block text-sm font-medium text-gray-700">Price Bracket (1-3)</label>
                <select
                    id="price_bracket"
                    name="price_bracket"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                >
                    <option value="" disabled>Select Price Bracket</option>
                    <option value="1">$</option>
                    <option value="2">$$</option>
                    <option value="3">$$$</option>
                </select>
            </div>

            <div>
                <label for="service_area" class="block text-sm font-medium text-gray-700">Service Area</label>
                <select
                    id="service_area"
                    name="service_area"
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
                    type="time"
                    id="open_hour"
                    name="open_hour"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="close_hour" class="block text-sm font-medium text-gray-700">Closing Hour</label>
                <input
                    type="time"
                    id="close_hour"
                    name="close_hour"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="open_days" class="block text-sm font-medium text-gray-700">Open Days</label>
                <select
                    id="open_days"
                    name="open_days"
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
                    id="bio"
                    name="bio"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    rows="3"
                ></textarea>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    rows="3"
                ></textarea>
            </div>

            <div>
                <label for="bank_account_number" class="block text-sm font-medium text-gray-700">Bank Account Number</label>
                <input
                    type="text"
                    id="bank_account_number"
                    name="bank_account_number"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name</label>
                <input
                    type="text"
                    id="bank_name"
                    name="bank_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="branch" class="block text-sm font-medium text-gray-700">Branch</label>
                <input
                    type="text"
                    id="branch"
                    name="branch"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                <input
                    type="text"
                    id="account_name"
                    name="account_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    required
                />
            </div>

            <div>
                <label for="instagram_link" class="block text-sm font-medium text-gray-700">Instagram Link</label>
                <input
                    type="url"
                    id="instagram_link"
                    name="instagram_link"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                />
            </div>

            <div>
                <label for="facebook_link" class="block text-sm font-medium text-gray-700">Facebook Link</label>
                <input
                    type="url"
                    id="facebook_link"
                    name="facebook_link"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                />
            </div>

            <div>
                <label for="website_url" class="block text-sm font-medium text-gray-700">Website URL</label>
                <input
                    type="url"
                    id="website_url"
                    name="website_url"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                />
            </div>

            <div>
                <label for="terms_conditions" class="block text-sm font-medium text-gray-700">Terms & Conditions</label>
                <textarea
                    id="terms_conditions"
                    name="terms_conditions"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    rows="3"
                ></textarea>
            </div>

            <div>
                <label for="brand_logo" class="block text-sm font-medium text-gray-700">Brand Logo</label>
                <input
                    type="file"
                    id="brand_logo"
                    name="brand_logo"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                />
            </div>

            <div>
                <label for="gallery" class="block text-sm font-medium text-gray-700">Gallery</label>
                <input
                    type="file"
                    id="gallery"
                    name="gallery"
                    multiple
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
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
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps(['categories']);

const submitForm = () => {
    const formData = new FormData();

    // Collect data from each input
    const storeName = document.getElementById('store_name').value;
    const street = document.getElementById('street').value;
    const city = document.getElementById('city').value;
    const district = document.getElementById('district').value;
    const province = document.getElementById('province').value;
    const storeEmail = document.getElementById('store_email').value;
    const storeContactName = document.getElementById('store_contact').value;
    const contactNumber = document.getElementById('contact_number').value;
    const storeGeneralNumber = document.getElementById('store_general_number').value;
    const category = document.getElementById('category').value;
    const priceBracket = document.getElementById('price_bracket').value;
    const serviceArea = document.getElementById('service_area').value;
    const openHour = document.getElementById('open_hour').value;
    const closeHour = document.getElementById('close_hour').value;
    const openDays = document.getElementById('open_days').value;
    const bio = document.getElementById('bio').value;
    const description = document.getElementById('description').value;
    const bankAccountNumber = document.getElementById('bank_account_number').value;
    const bankName = document.getElementById('bank_name').value;
    const branch = document.getElementById('branch').value;
    const accountName = document.getElementById('account_name').value;
    const instagramLink = document.getElementById('instagram_link').value;
    const facebookLink = document.getElementById('facebook_link').value;
    const websiteUrl = document.getElementById('website_url').value;
    const termsConditions = document.getElementById('terms_conditions').value;

    // Create JSON objects for store_address and store_contact
    const storeAddress = JSON.stringify({
        street,
        city,
        district,
        province
    });

    const storeContact = JSON.stringify({
        name: storeContactName,
        number: contactNumber
    });

    // Append all values to formData
    formData.append('store_name', storeName);
    formData.append('store_address', storeAddress);
    formData.append('store_contact', storeContact);
    formData.append('store_email', storeEmail);
    formData.append('store_general_number', storeGeneralNumber);
    formData.append('category', category);
    formData.append('price_bracket', priceBracket);
    formData.append('service_area', serviceArea);
    formData.append('open_hour', openHour);
    formData.append('close_hour', closeHour);
    formData.append('open_days', openDays);
    formData.append('bio', bio);
    formData.append('description', description);
    formData.append('bank_account_number', bankAccountNumber);
    formData.append('bank_name', bankName);
    formData.append('branch', branch);
    formData.append('account_name', accountName);
    formData.append('instagram_link', instagramLink);
    formData.append('facebook_link', facebookLink);
    formData.append('website_url', websiteUrl);
    formData.append('terms_conditions', termsConditions);

    // Handle file uploads for brand logo and gallery
    const brandLogo = document.getElementById('brand_logo').files[0];
    const galleryFiles = document.getElementById('gallery').files;

    formData.append('brand_logo', brandLogo);

    for (let i = 0; i < galleryFiles.length; i++) {
        formData.append('gallery[]', galleryFiles[i]);
    }

    Inertia.post('/vendor', formData, {
        onFinish: () => {
            // Reset the form or handle post-submit logic
            const form = document.querySelector('form');
            form.reset();
        }
    });
};

defineOptions({
    layout: AppLayout,
});
</script>

<style>
/* Add any custom styles here */
</style>
