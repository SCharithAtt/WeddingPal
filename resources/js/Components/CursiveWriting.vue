<template>
    <div v-if="isVisible" class="banner-container">
        <button @click="closeBanner" class="close-btn">&times;</button>
        <h1 class="header">{{ header }}</h1>
        <div class="overflow-hidden">
            <span
                class="text-content"
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
const isVisible = ref(true); // Control visibility of the banner

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
    const maxAnimatedWords = 15; // Number of words to animate before fast-forwarding

    const interval = setInterval(() => {
        if (index < totalWords && index < maxAnimatedWords) {
            displayText.value += (index === 0 ? '' : ' ') + words[index];
            index++;
        } else if (index >= maxAnimatedWords) {
            // Fast-forward to display the full text
            displayText.value = newValue;
            clearInterval(interval);
        }
    }, 150); // Slightly slower interval for softer reveal
}

function calculateWidth(text) {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    context.font = '20px "Century Gothic"'; // Smaller font size for the reduced size
    return context.measureText(text).width;
}

function closeBanner() {
    isVisible.value = false; // Hide the banner
}
</script>

<style scoped>
.banner-container {
    background: rgba(255, 255, 255, 0.85); /* Softer background with high opacity */
    padding: 12px; /* Reduced padding for a compact look */
    border: 1px solid #d1d1d1; /* Light gray border */
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    text-align: center;
    width: 70%; /* 70% width for a more centered look */
    position: relative; /* Required for positioning the close button */
    margin: 0 auto; /* Centering the banner */
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5rem;
    background: transparent;
    border: none;
    color: #8c8c8c;
    cursor: pointer;
    transition: color 0.3s ease;
}

.close-btn:hover {
    color: #e74c3c; /* Soft red on hover */
}

.header {
    font-family: 'Century Gothic', sans-serif;
    font-size: 1.6rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 500;
    text-transform: uppercase;
}

.text-content {
    font-family: 'Century Gothic', sans-serif;
    font-size: 1.1rem;
    color: #444;
    line-height: 1.6;
    text-shadow: 0.5px 0.5px 1px rgba(255, 255, 255, 0.7);
    transition: width 0.6s ease, opacity 0.8s ease-in-out;
    opacity: 0; /* Start with opacity at 0 */
}

.text-content {
    opacity: 1; /* Gradually fade in as text appears */
}
</style>
