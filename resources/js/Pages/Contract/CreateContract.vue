<template>
    <div>
        <h1>Create Contract</h1>
        <form @submit.prevent="createContract">
            <label for="title">Title</label>
            <input type="text" v-model="form.title" required />

            <label for="price">Price</label>
            <input type="number" v-model="form.price" required />

            <label for="details">Details</label>
            <textarea v-model="form.details"></textarea>

            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    setup() {
        const form = ref({
            title: '',
            price: '',
            details: '',
        });

        const createContract = () => {
            // Call API to create contract
            // Inertia.post(route('contracts.store'), form.value);
        };

        return { form, createContract };
    },
};
</script>
