<template>
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold">Undertakings</h2>
        <div class="flex space-x-4 mt-4">
            <button @click="showCurrent" :class="{'bg-blue-500 text-white': isCurrent, 'bg-gray-200': !isCurrent}" class="py-2 px-4 rounded">
                Current Undertakings
            </button>
            <button @click="showPast" :class="{'bg-blue-500 text-white': !isCurrent, 'bg-gray-200': isCurrent}" class="py-2 px-4 rounded">
                Past Undertakings
            </button>
        </div>

        <ul class="mt-6">
            <template v-if="isCurrent">
                <li class="border-b py-2">Current Undertaking 1: Project Name - Deadline: xxxx-xx-xx</li>
            </template>
            <template v-else>
                <li class="border-b py-2">Past Undertaking 1: Project Name - Completed on xxxx-xx-xx</li>
            </template>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import VendorLayout from "@/Layouts/VendorLayout.vue";

const isCurrent = ref(true);

const showCurrent = () => {
    isCurrent.value = true;
};

const showPast = () => {
    isCurrent.value = false;
};

defineOptions({
    layout : VendorLayout,
});
</script>
