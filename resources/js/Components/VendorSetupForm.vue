<template>
    <form @submit.prevent="submitForm">
        <div>
            <label for="vendorName">Vendor Name:</label>
            <input type="text" id="vendorName" v-model="vendorName" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" v-model="address" required>
        </div>
        <div>
            <label for="contactNumber">Contact Number:</label>
            <input type="tel" id="contactNumber" v-model="contactNumber" required>
        </div>
        <div>
            <label for="bio">Bio:</label>
            <textarea id="bio" v-model="bio" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            vendorName: '',
            address: '',
            contactNumber: '',
            bio: ''
        };
    },
    methods: {
        submitForm() {
            // Emit an event with form data
            this.$emit('form-submitted', {
                vendorName: this.vendorName,
                address: this.address,
                contactNumber: this.contactNumber,
                bio: this.bio
            });
        }
    }
};
</script>
