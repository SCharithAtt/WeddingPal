<template>
    <div class="container mx-auto p-6 m-6 drop-shadow-md border-2 rounded-2xl ">
        <!-- Save Button -->
        <button @click="saveWeddingDetails" class="bg-blue-600 text-white rounded p-2 mb-4">
            Save Wedding Details
        </button>

        <!-- Wedding Details Section -->
        <section class="mb-8">
            <h1 class="text-3xl font-bold mb-4">Wedding Summary</h1>
            <div class="mb-4">
                <strong>Bride's Name:</strong> {{ weddingDetails.bride }}
            </div>
            <div class="mb-4">
                <strong>Groom's Name:</strong> {{ weddingDetails.groom }}
            </div>
            <div class="mb-4">
                <strong>Date:</strong> {{ weddingDetails.date }}
            </div>
            <div class="mb-4">
                <strong>Time:</strong> {{ weddingDetails.timeFrom }} - {{ weddingDetails.timeTo }}
            </div>
            <div class="mb-4">
                <strong>Venue:</strong> {{ weddingDetails.venue }}
            </div>
            <div class="mb-4">
                <strong>Number of Guests:</strong> {{ weddingDetails.numberOfGuests }}
            </div>
            <div class="mb-4">
                <strong>Contact Person:</strong> {{ weddingDetails.contactPerson.name }} ({{ weddingDetails.contactPerson.mobile }})
            </div>
            <button @click="editWeddingDetails" class="bg-blue-500 text-white rounded p-2 mt-4">
                Edit
            </button>
        </section>

        <!-- Edit Modal -->
        <div v-if="modalVisible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
            <div class="bg-white p-6 rounded shadow-md w-1/3">
                <h2 class="font-bold text-lg mb-4">Edit Wedding Details</h2>
                <input v-model="editDetails.bride" class="border border-gray-300 rounded p-2 mb-2 w-full" placeholder="Enter Bride's Name" />
                <input v-model="editDetails.groom" class="border border-gray-300 rounded p-2 mb-2 w-full" placeholder="Enter Groom's Name" />
                <input v-model="editDetails.date" type="date" class="border border-gray-300 rounded p-2 mb-2 w-full" />
                <div class="flex space-x-2 mb-2">
                    <input v-model="editDetails.timeFrom" type="time" class="border border-gray-300 rounded p-2 w-1/2" />
                    <input v-model="editDetails.timeTo" type="time" class="border border-gray-300 rounded p-2 w-1/2" />
                </div>
                <input v-model="editDetails.venue" class="border border-gray-300 rounded p-2 mb-2 w-full" placeholder="Enter Venue" />
                <input v-model.number="editDetails.numberOfGuests" type="number" class="border border-gray-300 rounded p-2 mb-2 w-full" placeholder="Number of Guests" />
                <input v-model="editDetails.contactPerson.name" class="border border-gray-300 rounded p-2 mb-2 w-full" placeholder="Contact Person's Name" />
                <input v-model="editDetails.contactPerson.mobile" class="border border-gray-300 rounded p-2 mb-2 w-full" placeholder="Contact Person's Mobile" />
                <div class="flex justify-end">
                    <button @click="closeModal" class="bg-gray-300 text-black rounded p-2 mr-2">Cancel</button>
                    <button @click="updateWeddingDetails" class="bg-blue-500 text-white rounded p-2">Save Changes</button>
                </div>
            </div>
        </div>

        <!-- Selected Vendors Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Selected Vendors</h2>
            <div v-for="vendor in selectedVendors" :key="vendor.id" class="flex items-center justify-between bg-gray-100 p-4 rounded-lg shadow-md mb-2">
                <div>
                    <span class="font-medium">{{ vendor.category }} - {{ vendor.name }}</span>
                </div>
                <div class="text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <a href="#" class="text-blue-600 hover:underline">View Contract with Vendor</a>
            </div>
        </section>

        <!-- Guest List Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Guest List</h2>
            <div class="mb-4">
                <input v-model="newGuest.name" placeholder="Guest Name" class="border border-gray-300 rounded p-2 mr-2" />
                <input v-model.number="newGuest.pax" placeholder="Pax" type="number" class="border border-gray-300 rounded p-2" />
                <button @click="addGuest" class="bg-blue-600 text-white rounded p-2">Add Guest</button>
            </div>
            <div class="h-48 overflow-y-auto border border-gray-300 rounded p-2">
                <div v-for="guest in guestList" :key="guest.name" class="flex items-center mb-2">
                    <input type="checkbox" v-model="guest.checked" class="mr-2" />
                    <span>{{ guest.name }} - {{ guest.pax }} Pax</span>
                </div>
            </div>
            <button @click="saveGuests" class="bg-green-600 text-white rounded p-2 mt-2">Save</button>
        </section>

        <!-- Budget Overview Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Budget Overview</h2>
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <p><strong>Allocated Budget:</strong> ${{ budget.allocated }}</p>
                <p><strong>Spent:</strong> ${{ budget.spent }}</p>
                <p><strong>Remaining:</strong> ${{ budget.remaining }}</p>
            </div>
        </section>

        <!-- My Notes Section -->
        <section>
            <h2 class="text-2xl font-semibold mb-4">My Notes</h2>
            <textarea v-model="notes" placeholder="Write your notes here..." class="border border-gray-300 rounded p-4 w-full h-32"></textarea>
        </section>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import ClientLayout from "@/Layouts/ClientLayout.vue";

// Dummy data for wedding details
const weddingDetails = ref({
    bride: '',
    groom: '',
    date: '',
    timeFrom: '',
    timeTo: '',
    venue: '',
    numberOfGuests: 0,
    contactPerson: {
        name: '',
        mobile: '',
    },
});

// Dummy data
const selectedVendors = ref([
    { id: 1, category: 'Catering', name: 'Delicious Eats' },
    { id: 2, category: 'Photography', name: 'Capture Moments' },
    { id: 3, category: 'Florist', name: 'Beautiful Blooms' },
]);

const guestList = ref([
    { name: 'John Doe', pax: 2, checked: false },
    { name: 'Jane Smith', pax: 1, checked: false },
]);

const newGuest = ref({ name: '', pax: 0 });
const budget = ref({
    allocated: 10000,
    spent: 3000,
    remaining: 7000,
});

const notes = ref('');

// Modal visibility
const modalVisible = ref(false);
const editDetails = ref({ ...weddingDetails.value });

// Function to save wedding details
const saveWeddingDetails = () => {
    console.log('Wedding Details:', weddingDetails.value);
    // You can implement the save functionality here
};

// Function to edit wedding details
const editWeddingDetails = () => {
    editDetails.value = { ...weddingDetails.value }; // Prepare for editing
    modalVisible.value = true;
};

// Function to close modal
const closeModal = () => {
    modalVisible.value = false;
};

// Function to update wedding details
const updateWeddingDetails = () => {
    weddingDetails.value = { ...editDetails.value }; // Update the wedding details with the new values
    closeModal();
};

// Function to add a new guest
const addGuest = () => {
    if (newGuest.value.name && newGuest.value.pax > 0) {
        guestList.value.push({ ...newGuest.value, checked: false });
        newGuest.value.name = '';
        newGuest.value.pax = 0;
    }
};

// Function to save checked guests
const saveGuests = () => {
    const selectedGuests = guestList.value.filter(guest => guest.checked);
    console.log('Selected Guests:', selectedGuests);
    // You can update the guest list or perform other actions as needed
};

defineOptions({
    layout : ClientLayout,
});
</script>

<style scoped>
.container {
    max-width: 800px;
}
</style>
