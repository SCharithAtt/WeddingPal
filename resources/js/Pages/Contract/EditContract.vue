<template>
    <div>
        <h1>Edit Contract</h1>
        <form @submit.prevent="updateContract">
            <label for="title">Title</label>
            <input type="text" v-model="form.title" required />

            <label for="price">Price</label>
            <input type="number" v-model="form.price" required />

            <label for="details">Details</label>
            <textarea v-model="form.details"></textarea>

            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';

export default {
    props: {
        contract: Object,
    },
    setup(props) {
        const form = ref({ ...props.contract });

        const updateContract = () => {
            // Call API to update contract
            // Inertia.put(route('contracts.update', contract.id), form.value);
        };

        return { form, updateContract };
    },
};
</script>
