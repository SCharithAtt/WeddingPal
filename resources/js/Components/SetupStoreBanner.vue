<script setup>

import {Link} from "@inertiajs/vue3";
import { ref  } from 'vue';
</script>

<template>
    <div class="p-6">
        <div class="bg-blue-600 text-white p-4 rounded-lg shadow-lg mb-6">
            <h1 class="text-xl font-bold">Set your store up on WeddingPal !</h1>
            <p class="text-sm mt-2"> You're minutes away from having your store listed on the WeddingPal directory. Click below and start your journey as a vendor on WeddingPal!</p>
            <Link class="mt-2 bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 transition"
                  :href = "'/vendor/create'"
            >
                Set Up Your Store
            </Link>
        </div>

    </div>
</template>


