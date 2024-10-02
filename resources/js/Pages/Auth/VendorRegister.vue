<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Vendor Registration</h1>
        <form @submit.prevent="submit" class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <div class="mb-4">
                <input
                    v-model="form.name"
                    type="text"
                    placeholder="Username"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>
            <div class="mb-4">
                <input
                    v-model="form.email"
                    type="email"
                    placeholder="Email"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>
            <div class="mb-4">
                <input
                    v-model="form.password"
                    type="password"
                    placeholder="Password"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>
            <div class="mb-4">
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    placeholder="Confirm Password"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>
            <button
                type="submit"
                class="w-full px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none"
            >
                Register
            </button>
        </form>
        <div v-if="form.errors" class="mt-4 text-red-600">
            <p v-for="(error, field) in form.errors" :key="field">{{ error }}</p>
        </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

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

        return { form, submit };
    },
};
</script>

<style scoped>
/* Any additional custom styles can go here */
</style>
