<template>
    <div class="p-12 border-2 rounded-2xl drop-shadow-md m-6">
        <h1 class="font-bold text-3xl">Calendar</h1>

        <!-- Event Input Form -->
        <form @submit.prevent="submit" class="mb-4 space-y-4">
            <input
                v-model="form.title"
                placeholder="Event Title"
                required
                class="border rounded p-2 w-full"
            />
            <input
                type="datetime-local"
                v-model="form.start"
                required
                class="border rounded p-2 w-full"
                :min="minStartDate"
            />
            <input
                type="datetime-local"
                v-model="form.end"
                required
                :class="{ 'border-red-500': form.errors.end }"
                class="border rounded p-2 w-full"
            />
            <div v-if="form.errors.end" class="text-red-500 text-sm mb-2">{{ form.errors.end }}</div>
            <button
                type="submit"
                class="bg-blue-500 text-white rounded p-2"
            >
                Add Event
            </button>
        </form>

        <FullCalendar :options="calendarOptions" />

        <!-- Success Modal -->
        <div v-if="successModalVisible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
            <div class="bg-white p-4 rounded shadow-md">
                <p class="font-bold">Success!</p>
                <button @click="closeSuccessModal" class="mt-2 bg-blue-500 text-white rounded p-2">
                    Close
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import VendorLayout from "@/Layouts/VendorLayout.vue";

const { props } = usePage(); // Access page props
const calendarOptions = ref({
    plugins: [dayGridPlugin],
    initialView: 'dayGridMonth',
    weekends: true,
    events: props.events || [],
});

// Form handling with Inertia
const form = useForm({
    title: '',
    start: '',
    end: '',
});

// Validation errors
const minStartDate = new Date().toISOString().slice(0, 16);
const successModalVisible = ref(false);

// Function to validate end date-time
const validateEndDate = () => {
    if (form.end && new Date(form.end) <= new Date(form.start)) {
        form.errors.end = 'End date-time must be after the start date-time.';
        return false;
    }
    delete form.errors.end; // Clear error if validation passes
    return true;
};

// Submission function
const submit = () => {
    if (!validateEndDate()) {
        return; // Stop if validation fails
    }

    form.post('/events', {
        onSuccess: (page) => {
            // Add new event to the calendar
            const newEvent = {
                title: form.title,
                start: form.start,
                end: form.end,
            };
            calendarOptions.value.events.push(newEvent); // Update the calendar's events

            // Reset form after submission
            form.reset();
            successModalVisible.value = true; // Show success modal
        },
    });
};

// Function to close the success modal
const closeSuccessModal = () => {
    successModalVisible.value = false;
};

defineOptions({
    layout: VendorLayout,
});
</script>

<style>
/* Add any styles for your calendar here */
</style>
