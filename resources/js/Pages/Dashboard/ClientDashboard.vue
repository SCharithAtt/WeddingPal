<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { defineOptions } from 'vue';
import { Link } from '@inertiajs/vue3';
import SelectedVendors from '@/Components/SelectedVendors.vue';
import DashboardSummaryCard from '@/Components/DashboardSummaryCard.vue';

defineOptions({
    layout: ClientLayout,
});

const cards = [
    { title: "Wedding Checklist", icon: "📋", link: "/wedding-checklist" },
    { title: "Vendor Chat", icon: "💬", link: "/vendor-chat" },
    { title: "Current Contracts", icon: "📄", link: "/current-contracts" },
    { title: "Browse Vendors", icon: "🔍", link: "/browse-vendors" },
];
</script>

<template>
    <div>
        <h1 class="text-3xl font-bold text-center mb-6">Client Dashboard</h1>

        <!-- Horizontal strip of tiles -->
        <div class="flex justify-center space-x-4 p-4">
            <div
                v-for="(card, index) in cards"
                :key="index"
                class="tile flex flex-col items-center justify-center p-4 bg-gray-100 text-white rounded-lg hover:bg-gray-500 transition"
            >
                <Link :href="card.link" class="flex flex-col items-center">
                    <div class="text-5xl mb-2">{{ card.icon }}</div>
                    <div class="font-semibold">{{ card.title }}</div>
                </Link>
            </div>
        </div>

        <!-- Include previous component below the strip -->
        <DashboardSummaryCard :cards="SelectedVendors" />
    </div>
</template>

<style scoped>
.tile {
    flex: 1; /* Allow tiles to grow and fill the space evenly */
    min-width: 150px; /* Minimum width for each tile */
    height: 100px; /* Fixed height for the tiles */
    transition: transform 0.3s;
}
.tile:hover {
    transform: scale(1.05);
}
</style>
