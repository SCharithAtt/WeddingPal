<template>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg m-6">
        <h1 class="text-2xl font-bold mb-4">Wedding Details</h1>
        <h1 class="text-2xl font-bold mb-4">{{ wedding.bride }} And {{wedding.groom}}</h1>
        <div class="mb-4">
            <span class="font-semibold">Bride:</span> <span>{{ wedding.bride }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Groom:</span> <span>{{ wedding.groom }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Date:</span> <span>{{ formatDate(wedding.date) }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Time:</span> <span>{{ formatTime(wedding.time_from) }} - {{ formatTime(wedding.time_to) }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Venue:</span> <span>{{ wedding.venue }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Number of Guests:</span> <span>{{ wedding.number_of_guests }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Contact Person:</span> <span>{{ wedding.contact_person_name }} ({{ wedding.contact_person_mobile }})</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Notes:</span> <span>{{ wedding.notes }}</span>
        </div>
        <div class="text-gray-500 text-sm">
            <span>Created At: {{ formatDate(wedding.created_at) }}</span><br />
            <span>Updated At: {{ formatDate(wedding.updated_at) }}</span>
        </div>
    </div>
</template>

<script setup>
import { toRefs } from 'vue';
import ClientLayout from "@/Layouts/ClientLayout.vue";

// Assuming $page.props.wedding is available as a prop
const props = defineProps({
    wedding: {
        type: Object,
        required: true
    }
});

// Formatting date function
function formatDate(dateString) {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
}

// Formatting time function
function formatTime(timeString) {
    return new Date(`1970-01-01T${timeString}`).toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit',
    });
}

// Destructure props
const { wedding } = toRefs(props);

defineOptions({
    layout : ClientLayout,
});
</script>

<style scoped>
/* Additional styles can be added here */
</style>
