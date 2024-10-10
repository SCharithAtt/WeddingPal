<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { defineOptions } from 'vue';
import CursiveWriting from "@/Components/CursiveWriting.vue";
import { Link } from "@inertiajs/vue3";

defineOptions({
    layout: ClientLayout,
});
</script>

<template>
    <div class="dashboard-container">
        <CursiveWriting
            header="Welcome to your dashboard"
            text="Here you can view your selected vendors, manage your bookings, and more. You can also browse the marketplace!"
        />
        <div class="grid-container">
            <div class="tile">
                <Link href="/dashboard/my-wedding" class="tile-link">My Wedding</Link>
            </div>
            <div class="tile ">
                <Link href="/dashboard/marketplace" class="tile-link">Browse Marketplace</Link>
            </div>
            <div class="tile">
                <Link href="/user/profile" class="tile-link">Edit Profile</Link>
            </div>

            <div class="tile">
                <Link href="/wedding/create" class="tile-link">New Wedding</Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.dashboard-container {
    padding: 2rem;
    background-color: #f9fafb;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.grid-container {
    display: flex;
    justify-content: center; /* Center items horizontally */
    gap: 1.5rem;
    margin-top: 2rem;
}

.tile {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.tile:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.tile-link {
    text-decoration: none;
    color: #3b82f6; /* Tailwind's blue-500 */
    font-weight: 600;
    transition: color 0.3s;
}

.tile-link:hover {
    color: #2563eb; /* Tailwind's blue-600 */
}

h1 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    color: #1f2937; /* Tailwind's gray-800 */
}

p {
    color: #4b5563; /* Tailwind's gray-600 */
}
</style>
