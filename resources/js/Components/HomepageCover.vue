<template>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-25">
        <div class="text-center">
            <button @click="startJourney" class="py-4 px-8 bg-white border-2 border-black text-black font-bold rounded-lg hover:bg-black hover:text-white transition duration-300">Start your wedding journey</button>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        startJourney() {
            // Add your logic here for what happens when the button is clicked
            console.log("Starting wedding journey...");
        }
    }
}
</script>
