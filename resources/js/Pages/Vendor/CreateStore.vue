<template>
    <div class="bg-cover bg-gradient-to-br from-white via-gray-200 to-white flex justify-center">
        <div class="max-w-4xl m-6 rounded-2xl drop-shadow-lg p-8 " style="background-image: url('https://elements-resized.envatousercontent.com/envato-shoebox/9b72/12d8-17f9-4111-9b38-f7534ddece4e/rm218batch2-aum-05.jpg?w=1600&cf_fit=scale-down&mark-alpha=18&mark=https%3A%2F%2Felements-assets.envato.com%2Fstatic%2Fwatermark4.png&q=85&format=auto&s=dee65198d1545953d120b743934738a606b616dbc6e24f651ba2f4f83aea4c17')">
            <h2 class="text-3xl font-bold text-center mb-8"> <span> <application-logo class="inline-block w-1/4 h-1/4" /> </span> Register Your Store</h2>

            <form @submit.prevent="submitForm" class="space-y-6" ref="formRef">
                <!-- Store Name -->
                <div>
                    <label for="store_name" class="block text-sm font-medium text-black">Store Name</label>
                    <input
                        type="text"
                        id="store_name"
                        name="store_name"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.store_name"
                        required
                    />
                </div>

                <!-- Store Email -->
                <div>
                    <label for="store_email" class="block text-sm font-medium text-black">Store Email</label>
                    <input
                        type="email"
                        id="store_email"
                        name="store_email"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.store_email"
                        required
                    />
                </div>

                <!-- Store Address -->
                <div class="shadow-2xl pl-2">
                    <h3 class="font-bold my-4 mr-4">Store Location details</h3>
                    <div>
                        <label for="store_address_street" class="block text-sm font-medium text-black">Street</label>
                        <input
                            type="text"
                            id="store_address_street"
                            name="store_address_street"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.store_address.street"
                            required
                        />
                    </div>
                    <div>
                        <label for="store_address_city" class="block text-sm font-medium text-black">City</label>
                        <input
                            type="text"
                            id="store_address_city"
                            name="store_address_city"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.store_address.city"
                            required
                        />
                    </div>
                    <div>
                        <label for="store_address_district" class="block text-sm font-medium text-black">District</label>
                        <input
                            type="text"
                            id="store_address_district"
                            name="store_address_district"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.store_address.district"
                            required
                        />
                    </div>
                    <div>
                        <label for="store_address_province" class="block text-sm font-medium text-black">Province</label>
                        <input
                            type="text"
                            id="store_address_province"
                            name="store_address_province"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.store_address.province"
                            required
                        />
                    </div>
                </div>

                <!-- Contact Person -->
                <div class="shadow-2xl pl-2">
                    <h3 class="font-bold my-4 mr-4">Store contact</h3>
                    <div>
                        <label for="store_contact_person" class="block text-sm font-medium text-black">Contact Person</label>
                        <input
                            type="text"
                            id="store_contact_person"
                            name="store_contact_person"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.store_contact.person"
                            required
                        />
                    </div>

                    <div>
                        <label for="store_contact_phone" class="block text-sm font-medium text-black">Contact person phone number</label>
                        <input
                            type="text"
                            id="store_contact_phone"
                            name="store_contact_phone"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.store_contact.phone"
                            required
                        />
                    </div>
                    <div>
                        <label for="store_contact_email" class="block text-sm font-medium text-black">Contact Person Email</label>
                        <input
                            type="text"
                            id="store_contact_email"
                            name="store_contact_email"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.store_contact.email"
                            required
                        />
                    </div>
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-black">Category</label>
                    <select
                        id="category"
                        name="category"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.category"
                        required
                    >
                        <option value="" disabled>Select a category</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Health">Health</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                </div>

                <!-- Price Bracket -->
                <div>
                    <label for="price_bracket" class="block text-sm font-medium text-black">Price Bracket</label>
                    <select
                        id="price_bracket"
                        name="price_bracket"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.price_bracket"
                        required
                    >
                        <option value="" disabled>Select Price Bracket</option>
                        <option value="1">$</option>
                        <option value="2">$$</option>
                        <option value="3">$$$</option>
                    </select>
                </div>

                <!-- Service Area -->
                <div>
                    <label for="service_area" class="block text-sm font-medium text-black">Service Area</label>
                    <select
                        id="service_area"
                        name="service_area"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.service_area"
                        required
                    >
                        <option value="" disabled>Select Service Area</option>
                        <option value="Island wide">Island wide</option>
                        <option value="District">District</option>
                        <option value="Province">Province</option>
                    </select>
                </div>

                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-black">Bio</label>
                    <textarea
                        id="bio"
                        name="bio"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        rows="3"
                        v-model="formData.bio"
                    ></textarea>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-black">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        rows="3"
                        v-model="formData.description"
                    ></textarea>
                </div>

                <!-- Bank Account Number -->
                <div>
                    <label for="bank_account_number" class="block text-sm font-medium text-black">Bank Account Number</label>
                    <input
                        type="text"
                        id="bank_account_number"
                        name="bank_account_number"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.bank_account_number"
                        required
                    />
                </div>

                <!-- Bank Name -->
                <div>
                    <label for="bank_name" class="block text-sm font-medium text-black">Bank Name</label>
                    <input
                        type="text"
                        id="bank_name"
                        name="bank_name"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.bank_name"
                        required
                    />
                </div>

                <!-- Branch -->
                <div>
                    <label for="branch" class="block text-sm font-medium text-black">Bank Branch</label>
                    <input
                        type="text"
                        id="branch"
                        name="branch"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.branch"
                        required
                    />
                </div>

                <!-- Account Name -->
                <div>
                    <label for="account_name" class="block text-sm font-medium text-black">Account Name</label>
                    <input
                        type="text"
                        id="account_name"
                        name="account_name"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        v-model="formData.account_name"
                        required
                    />
                </div>

                <!-- Opening Hours -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label for="open_hours" class="block text-sm font-medium text-black">Opening Hours</label>
                        <input
                            type="time"
                            id="open_hours"
                            name="open_hours"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.open_hours"
                            required
                        />
                    </div>

                    <div class="col-span-1">
                        <label for="close_hours" class="block text-sm font-medium text-black">Closing Hours</label>
                        <input
                            type="time"
                            id="close_hours"
                            name="close_hours"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.close_hours"
                            required
                        />
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div>
                    <label for="terms_conditions" class="block text-sm font-medium text-black">Terms & Conditions</label>
                    <textarea
                        id="terms_conditions"
                        name="terms_conditions"
                        class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                        rows="3"
                        v-model="formData.terms_conditions"
                    ></textarea>
                </div>

                <!-- Website and Social Media Links -->
                <div class="space-y-4">
                    <div>
                        <label for="website_url" class="block text-sm font-medium text-black">Website URL</label>
                        <input
                            type="url"
                            id="website_url"
                            name="website_url"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.website_url"
                        />
                    </div>
                    <div>
                        <label for="facebook_link" class="block text-sm font-medium text-black">Facebook Link</label>
                        <input
                            type="url"
                            id="facebook_link"
                            name="facebook_link"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.facebook_link"
                        />
                    </div>
                    <div>
                        <label for="instagram_link" class="block text-sm font-medium text-black">Instagram Link</label>
                        <input
                            type="url"
                            id="instagram_link"
                            name="instagram_link"
                            class="mt-1 block w-full border border-gray-400 rounded-md p-3 focus:outline-none focus:border-black focus:ring-2 focus:ring-black"
                            v-model="formData.instagram_link"
                        />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-6">
                    <button
                        type="submit"
                        class="w-full sm:w-auto bg-black text-white font-semibold py-3 px-6 rounded-md shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black"
                    >
                        Register Store
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

// Form data model
const formData = ref({
    store_name: '',
    store_email: '',
    store_address: {
        street: '',
        city: '',
        district: '',
        province: ''
    },
    store_contact: {
        person: '',
        phone: '',
        email: ''
    },
    category: '',
    price_bracket: '',
    service_area: '',
    bio: '',
    description: '',
    images: [],
    bank_account_number: '',
    bank_name: '',
    branch: '',
    account_name: '',
    open_hours: '',
    close_hours: '',
    terms_conditions: '',
    website_url: '',
    facebook_link: '',
    instagram_link: ''
});

// Reference to the form element
const formRef = ref(null);

// Submit form function
const submitForm = () => {
    const form = formRef.value;

    // Compile store_address and store_contact as JSON strings
    formData.value.store_address = JSON.stringify(formData.value.store_address);
    formData.value.store_contact = JSON.stringify(formData.value.store_contact);

    // Check form validity
    if (form.checkValidity()) {
        Inertia.post('/vendor', formData.value, {
            onFinish: () => {
                form.reset();
            }
        });
    } else {
        alert('Please fill in all required fields.');
    }
};
</script>
