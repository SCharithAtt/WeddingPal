<template>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md m-6">
        <h1 class="text-2xl font-bold mb-4">Create Wedding</h1>
        <form @submit.prevent="submit">
            <div class="mb-4" v-for="(field, index) in fields" :key="index">
                <label :for="field.id" class="block text-sm font-medium text-gray-700">{{ field.label }}</label>
                <input
                    v-model="form[field.model]"
                    :type="field.type"
                    :id="field.id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                    :required="field.required"
                    :min="field.min"
                    :pattern="field.pattern"
                    :placeholder="field.placeholder"
                />
                <span class="text-red-500 text-sm">{{ errors[field.model] }}</span>
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 text-white font-bold py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200"
            >
                Create Wedding
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ClientLayout from "@/Layouts/ClientLayout.vue";

const form = useForm({
    bride: '',
    groom: '',
    date: '',
    time_from: '',
    time_to: '',
    venue: '',
    number_of_guests: null,
    contact_person_name: '',
    contact_person_mobile: '',
    notes: '',
});

const errors = ref({}); // Reactive error object

const fields = [
    { label: 'Bride Name', model: 'bride', type: 'text', id: 'bride', required: true },
    { label: 'Groom Name', model: 'groom', type: 'text', id: 'groom', required: true },
    { label: 'Wedding Date', model: 'date', type: 'date', id: 'date', required: true },
    { label: 'Time From', model: 'time_from', type: 'time', id: 'time_from', required: true },
    { label: 'Time To', model: 'time_to', type: 'time', id: 'time_to', required: true },
    { label: 'Venue', model: 'venue', type: 'text', id: 'venue' },
    { label: 'Number of Guests', model: 'number_of_guests', type: 'number', id: 'number_of_guests', min: 1 },
    { label: 'Contact Person Name', model: 'contact_person_name', type: 'text', id: 'contact_person_name' },
    { label: 'Contact Person Mobile', model: 'contact_person_mobile', type: 'tel', id: 'contact_person_mobile', pattern: '[0-9]{10}', placeholder: '1234567890' },
    { label: 'Notes', model: 'notes', type: 'textarea', id: 'notes' },
];

const submit = () => {
    form.post('/wedding', {
        onSuccess: () => {
            // Handle success (e.g., redirect or show a success message)
            console.log('Wedding created successfully!');
        },
        onError: (errors) => {
            // Assign error messages
            Object.assign(errors.value, errors);
        }
    });
};


defineOptions({
    layout : ClientLayout,
});
</script>
