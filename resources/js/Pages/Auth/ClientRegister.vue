<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">


        <h1 class="text-2xl font-bold text-center mb-6">Client Registration</h1>
        <form @submit.prevent="submit" class="space-y-4">
            <input
                v-model="form.name"
                placeholder="Name"
                required
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <input
                v-model="form.email"
                type="email"
                placeholder="Email"
                required
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <input
                v-model="form.password"
                type="password"
                placeholder="Password"
                required
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <input
                v-model="form.password_confirmation"
                type="password"
                placeholder="Confirm Password"
                required
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <button
                type="submit"
                class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200"
            >
                Register
            </button>
        </form>
        <div v-if="form.errors" class="mt-4">
            <p
                v-for="(error, field) in form.errors"
                :key="field"
                class="text-red-600"
            >
                {{ error }}
            </p>
        </div>
    </div>
</template>

<script>
import {useForm} from '@inertiajs/vue3';
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";

export default {
    components: {AuthenticationCardLogo, AuthenticationCard},
    setup() {
        const form = useForm({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        });

        function submit() {
            form.post('/register/client', {
                onFinish: () => {
                    // Optionally handle what happens after submission, like redirecting
                },
            });
        }

        return {form, submit};
    },
};
</script>
