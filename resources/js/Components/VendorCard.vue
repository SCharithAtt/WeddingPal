<template>
    <div class="flex bg-white rounded shadow-md overflow-hidden">
        <!-- Left side - photo boilerplate -->
        <div class="flex-shrink-0">
            <img :src="photoURL" alt="Vendor Photo" class="h-32 w-32 object-cover" />
        </div>

        <!-- Right side - text content -->
        <div class="p-4 flex flex-col justify-between">
            <!-- Heading -->
            <h2 class="text-xl font-semibold mb-2">{{ VendorName }}</h2>

            <!-- Description -->
            <p class="text-gray-700 mb-4">{{ description }}</p>

            <!-- Button -->
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                View Full Profile
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "vendorListing",
    props: {
        VendorName: {
            type: String,
            required: true,
        },
        photoURL: {
            type: String,
            required: true,
        },
        description: {
            type: String,
            required: true,
        },
    },
};
</script>
