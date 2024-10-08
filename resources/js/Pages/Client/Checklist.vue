<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import {ref} from 'vue';

defineOptions({
    layout: ClientLayout
});

const checklistItems = ref([
    {id: 1, text: 'Book the venue', completed: false},
    {id: 2, text: 'Choose a wedding dress', completed: false},
    {id: 3, text: 'Send out invitations', completed: false},
    {id: 4, text: 'Book photographer', completed: false},
    {id: 5, text: 'Arrange catering', completed: false},
]);

const toggleCompletion = (item) => {
    item.completed = !item.completed;
};

const addItem = () => {
    const newItemText = newChecklistItem.value.trim();
    if (newItemText) {
        checklistItems.value.push({id: checklistItems.value.length + 1, text: newItemText, completed: false});
        newChecklistItem.value = ''; // Clear input
    }
};

const newChecklistItem = ref('');
</script>

<template>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">The Wedding Checklist</h1>

        <ul class="space-y-2">
            <li v-for="item in checklistItems" :key="item.id" class="flex items-center">
                <input
                    type="checkbox"
                    class="mr-2"
                    v-model="item.completed"
                    @change="toggleCompletion(item)"
                />
                <span :class="{'line-through text-gray-400': item.completed}">{{ item.text }}</span>
            </li>
        </ul>

        <div class="mt-4">
            <h2 class="text-xl font-semibold mb-2">Add New Item</h2>
            <input
                type="text"
                class="p-2 border border-gray-300 rounded-md w-full"
                placeholder="New checklist item..."
                v-model="newChecklistItem"
            />
            <button
                class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                @click="addItem"
            >
                Add Item
            </button>
        </div>
    </div>
</template>

<style scoped>
/* Add any scoped styles here */
</style>
