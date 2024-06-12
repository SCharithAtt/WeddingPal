<template>
    <div class="bg-gray-200 border-4 border-gray-400 rounded-lg shadow-md inline-block transition duration-300 ease-in-out hover:border-purple-600 transform hover:-translate-y-1 hover:shadow-lg p-4">
        <input type="file" @change="handleFileUpload" ref="fileInput" style="display: none" accept="image/*">
        <button @click="openFileInput">Upload Image</button>
        <button v-if="imageUrl" @click="removeImage">Remove Image</button>
        <img v-if="imageUrl" :src="imageUrl" alt="Uploaded Image" style="max-width: 300px; margin-top: 10px;">
    </div>
</template>

<script>
export default {
    data() {
        return {
            imageUrl: null
        };
    },
    methods: {
        openFileInput() {
            this.$refs.fileInput.click();
        },
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    this.imageUrl = reader.result;
                };
                reader.readAsDataURL(file);
            }
        },
        removeImage() {
            this.imageUrl = null;
        }
    }
};
</script>
