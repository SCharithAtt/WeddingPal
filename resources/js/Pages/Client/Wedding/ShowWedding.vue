<template>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md m-6">
        <h1 class="text-2xl font-bold mb-4">Wedding Details</h1>
        <div class="mb-4" v-for="(field, index) in fields" :key="index">
            <label class="block text-sm font-medium text-gray-700">{{ field.label }}</label>
            <div class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-gray-100">
                {{ wedding[field.model] }}
            </div>
        </div>
        <router-link :to="`/wedding/${wedding.id}/edit`" class="mt-4 inline-block bg-indigo-600 text-white font-bold py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200">
            Edit Wedding
        </router-link>
    </div>
</template>

<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";

const props = defineProps({
    wedding: Object,
});

const fields = [
    { label: 'Bride Name', model: 'bride' },
    { label: 'Groom Name', model: 'groom' },
    { label: 'Wedding Date', model: 'date' },
    { label: 'Time From', model: 'time_from' },
    { label: 'Time To', model: 'time_to' },
    { label: 'Venue', model: 'venue' },
    { label: 'Number of Guests', model: 'number_of_guests' },
    { label: 'Contact Person Name', model: 'contact_person_name' },
    { label: 'Contact Person Mobile', model: 'contact_person_mobile' },
    { label: 'Notes', model: 'notes' },
];

defineOptions({
    layout: ClientLayout,
});
</script>
