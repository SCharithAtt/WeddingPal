
<template>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Couple Information</h1>

        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="partner1-name">Partner 1 Name</label>
                <input
                    type="text"
                    id="partner1-name"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    placeholder="Enter your name"
                    v-model="partner1Name"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="partner2-name">Partner 2 Name</label>
                <input
                    type="text"
                    id="partner2-name"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    placeholder="Enter your partner's name"
                    v-model="partner2Name"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="contact-email">Contact Email</label>
                <input
                    type="email"
                    id="contact-email"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    placeholder="Enter your email"
                    v-model="contactEmail"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="phone-number">Phone Number</label>
                <input
                    type="tel"
                    id="phone-number"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    placeholder="Enter your phone number"
                    v-model="phoneNumber"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="address">Address</label>
                <textarea
                    id="address"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    rows="3"
                    placeholder="Enter your address"
                    v-model="address"
                ></textarea>
            </div>

            <button
                type="submit"
                class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                @click.prevent="updateInformation"
            >
                Update Information
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import ClientLayout from "@/Layouts/ClientLayout.vue";

defineOptions({
    layout: ClientLayout
});

const partner1Name = ref('');
const partner2Name = ref('');
const contactEmail = ref('');
const phoneNumber = ref('');
const address = ref('');

const updateInformation = () => {
    // Logic to handle information update
    console.log({
        partner1Name: partner1Name.value,
        partner2Name: partner2Name.value,
        contactEmail: contactEmail.value,
        phoneNumber: phoneNumber.value,
        address: address.value,
    });
    // You could add API call logic here to save the information
};


</script>

<style scoped>
/* Add any scoped styles here */
</style>
