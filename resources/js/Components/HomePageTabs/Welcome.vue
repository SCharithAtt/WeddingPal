<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>

    <div
        class="flex flex-col h-screen"
        style="background-image: url('/images/bgCover.jpg'); background-size: cover; background-position: center;"
    >
        <!--            This div-->

        <div
            class=" flex-grow  inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white text-center">
            <h1 class="text-5xl font-bold">WeddingPal</h1>
            <p class="mt-4 text-2xl">Your Dream Wedding Starts Here</p>
            <Link :href="'/register/client'" class="mt-8 bg-white text-black px-4 py-2 text-lg rounded-full">
                Get Started
            </Link>
        </div>


    </div>

</template>

<style scoped>

</style>
