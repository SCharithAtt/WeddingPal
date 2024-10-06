<script setup>
import VendorLayout from "@/Layouts/VendorLayout.vue";
import VendorStoreInfo from "@/Pages/Vendor/Store/VendorStoreInfo.vue";

defineOptions({
        layout: VendorLayout,
    });
</script>

<template>
<h1> Welcome to your Vendor Dashboard </h1>

    <VendorStoreInfo/>
</template>

