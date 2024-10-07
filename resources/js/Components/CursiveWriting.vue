<template>
    <div class="royal-container">
        <h1 class="header">{{ header }}</h1>
        <div class="overflow-hidden">
            <span
                class="font-alex-brush text-content"
                :style="{ width: `${width}px` }"
            >
                {{ displayText }}
            </span>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    header: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    }
});

const displayText = ref('');
const width = ref(0);

watch(
    () => props.text,
    (newValue) => {
        animateText(newValue);
    },
    { immediate: true }
);

function animateText(newValue) {
    displayText.value = ''; // Reset text
    width.value = calculateWidth(newValue); // Calculate width for animation

    const words = newValue.split(' ');
    let index = 0;
    const totalWords = words.length;
    const maxAnimatedWords = 10; // Number of words to animate before fast-forwarding

    const interval = setInterval(() => {
        if (index < totalWords && index < maxAnimatedWords) {
            displayText.value += (index === 0 ? '' : ' ') + words[index];
            index++;
        } else if (index >= maxAnimatedWords) {
            // Fast-forward to display the full text
            displayText.value = newValue;
            clearInterval(interval);
        }
    }, 150); // Adjust speed of animation here
}

function calculateWidth(text) {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    context.font = '30px Alex Brush'; // Use the Alex Brush font
    return context.measureText(text).width;
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap');

.royal-container {
    background: linear-gradient(to right, #f0e68c, #e3d1b7);
    padding: 20px;
    border: 5px solid #c5a052;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.header {
    font-family: 'Alex Brush', cursive;
    font-size: 2.5rem;
    color: #4b3d1c;
    margin-bottom: 20px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.font-alex-brush {
    font-family: 'Alex Brush', cursive;
}

.text-content {
    font-size: 1.5rem; /* Adjust text size as needed */
    color: #3b2a0c;
    text-shadow: 0.5px 0.5px 1px rgba(255, 255, 255, 0.6);
}
</style>
