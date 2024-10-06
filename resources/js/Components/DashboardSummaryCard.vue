<template>
    <div class="flex flex-wrap justify-center">
        <div
            v-for="(card, index) in cards"
            :key="index"
            class="m-4 w-1/3 max-w-s bg-gray-100 rounded-lg shadow-lg transform transition-transform hover:scale-102"
        >
            <div class="p-6">
                <component :is="card" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    cards: {
        type: Array,
        required: true,
    },
});
</script>
