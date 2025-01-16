<template>
    <!-- Background Image -->
    <img src="https://elements-resized.envatousercontent.com/envato-shoebox/9b72/12d8-17f9-4111-9b38-f7534ddece4e/rm218batch2-aum-05.jpg?w=1600&cf_fit=scale-down&mark-alpha=18&mark=https%3A%2F%2Felements-assets.envato.com%2Fstatic%2Fwatermark4.png&q=85&format=auto&s=dee65198d1545953d120b743934738a606b616dbc6e24f651ba2f4f83aea4c17" alt="Wedding Background" class="fixed top-0 left-0 w-full h-full rounded-lg opacity-50 bg-cover" />

    <div class="relative max-w-md mx-auto mt-10 p-6 bg-gradient-to-r from-white via-gray-50 to-gray-100 rounded-lg shadow-lg">


        <AuthenticationCardLogo class="h-16 w-auto" />
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Client Registration</h1>

        <!-- Form Section -->
        <form @submit.prevent="submit" class="space-y-6 relative">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    v-model="form.name"
                    type="text"
                    id="name"
                    placeholder="Enter your name"
                    required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    v-model="form.email"
                    type="email"
                    id="email"
                    placeholder="Enter your email"
                    required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    v-model="form.password"
                    type="password"
                    id="password"
                    placeholder="Enter your password"
                    required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    id="password_confirmation"
                    placeholder="Confirm your password"
                    required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200"
            >
                Register
            </button>
        </form>

        <!-- Error Messages Section -->
        <div v-if="form.errors" class="mt-6 space-y-3">
            <p
                v-for="(error, field) in form.errors"
                :key="field"
                class="text-red-600 text-sm"
            >
                {{ error }}
            </p>
        </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";

export default {
    components: { AuthenticationCardLogo },
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

        return { form, submit };
    },
};
</script>

<style scoped>
/* Ensure smooth transitions on inputs and button */
input, button {
    transition: all 0.3s ease;
}

/* Apply a slight lift effect on focus/hover */
input:focus, button:hover {
    outline: none;
    transform: translateY(-2px);
}

/* Adjust for consistent spacing and ensure no overlap */
input {
    margin-top: 0.5rem;
}

button {
    margin-top: 1.5rem;
}

/* Additional spacing to ensure error messages do not overlap */
div.mt-6 {
    margin-top: 2rem;
}
</style>
