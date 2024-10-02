<template>
    <div>
        <h1>Vendor Registration</h1>
        <form @submit.prevent="submit">
            <input v-model="form.name" placeholder="Name" required />
            <input v-model="form.email" type="email" placeholder="Email" required />
            <input v-model="form.password" type="password" placeholder="Password" required />
            <input v-model="form.password_confirmation" type="password" placeholder="Confirm Password" required />
            <input v-model="form.company_name" placeholder="Company Name" required />
            <button type="submit">Register</button>
        </form>
        <div v-if="form.errors" class="errors">
            <p v-for="(error, field) in form.errors" :key="field">{{ error }}</p>
        </div>
    </div>
</template>

<script>
import {useForm} from '@inertiajs/vue3';

export default {
    setup() {
        const form = useForm({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            company_name: '',
        });

        function submit() {
            form.post('/register/vendor', {
                onFinish: () => {
                    // Optionally handle what happens after submission, like redirecting
                },
            });
        }

        return {form, submit};
    },
};
</script>

<style scoped>
.errors {
    color: red;
}
</style>
