<script setup>
import { ref } from 'vue';
import VendorLayout from "@/Layouts/VendorLayout.vue";
import VendorStoreInfo from "@/Pages/Vendor/Store/VendorStoreInfo.vue";
import CursiveWriting from "@/Components/CursiveWriting.vue";

defineOptions({
    layout: VendorLayout,
});

// Reactive Variables for Analytics Data
const totalClientRequests = ref(320); // Example data
const currentUndertakings = ref(8);  // Example data
const storeViews = ref(1245);        // Example data
const selectedAnalytics = ref('totalClientRequests'); // Default selected analytics
const selectedPeriod = ref('Month'); // Default period selection (monthly)
const showCursiveNotification = ref(true);

// Tabs for Analytics
const tabs = [
    { label: 'Total Client Requests', value: 'totalClientRequests' },
    { label: 'Current Undertakings', value: 'currentUndertakings' },
    { label: 'Store Views', value: 'storeViews' }
];

// Period Options
const periodOptions = [
    { label: 'Daily', value: 'Day' },
    { label: 'Monthly', value: 'Month' },
    { label: 'Yearly', value: 'Year' },
    { label: 'Custom Period', value: 'Time Period' }
];

// Function to handle tab switching
const selectTab = (tabValue) => {
    selectedAnalytics.value = tabValue;
};

// Function to handle period selection change
const selectPeriod = (periodValue) => {
    selectedPeriod.value = periodValue;
};
</script>

<template>
    <div class="dashboard-container">
        <!-- Centered Header and Subheading -->
        <div class="header-container flex items-center space-x-4">
            <div class="w-12 h-12 overflow-hidden rounded-full">
                <img src="https://static.vecteezy.com/system/resources/previews/023/654/784/non_2x/golden-logo-template-free-png.png" alt="Vendor Logo" class="w-full h-full object-cover">
            </div>
            <div>
                <h1 class="page-header text-2xl font-semibold">{{ $page.props.vendor.store_name }}</h1>
<!--                <h4 class="page-subheader text-sm text-gray-600">Vendor Dashboard</h4>-->
            </div>
            <h4 class="page-subheader text-sm text-gray-600">Vendor Dashboard</h4>
        </div>

        <!-- Cursive Writing Banner (Closable) -->
        <CursiveWriting v-if="showCursiveNotification" class="notification-banner"
                        header="Welcome to Your Dashboard"
                        text="Manage your store, track your analytics, and engage with clients all in one place."
        />

        <!-- Period Selection -->
        <div class="period-selection">
            <div class="period-label">Select Period:</div>
            <div class="period-options">
                <div
                    v-for="option in periodOptions"
                    :key="option.value"
                    :class="['period-option', { active: selectedPeriod === option.value }]"
                    @click="selectPeriod(option.value)"
                >
                    {{ option.label }}
                </div>
            </div>

            <!-- Custom Period Date Picker (Visible only for 'Custom' option) -->
            <div v-if="selectedPeriod === 'Time Period'" class="custom-period-picker">
                <input type="date" class="custom-date-picker" placeholder="Start Date" />
                <span class="to-date">to</span>
                <input type="date" class="custom-date-picker" placeholder="End Date" />
            </div>
        </div>

        <!-- Analytics Section with Tab Switching -->
        <h2 class="section-header">This {{ selectedPeriod.charAt(0).toUpperCase() + selectedPeriod.slice(1) }} Analytics</h2>
        <div class="tabs">
            <div
                v-for="tab in tabs"
                :key="tab.value"
                :class="['tab', { active: selectedAnalytics === tab.value }]"
                @click="selectTab(tab.value)"
            >
                {{ tab.label }}
            </div>
        </div>

        <!-- Analytics Cards Display Based on Selected Tab -->
        <div v-if="selectedAnalytics === 'totalClientRequests'" class="analytics-card">
            <h3 class="card-title">Total Client Requests</h3>
            <p class="card-content">{{ totalClientRequests }}</p>
        </div>

        <div v-if="selectedAnalytics === 'currentUndertakings'" class="analytics-card">
            <h3 class="card-title">Current Undertakings</h3>
            <p class="card-content">{{ currentUndertakings }}</p>
        </div>

        <div v-if="selectedAnalytics === 'storeViews'" class="analytics-card">
            <h3 class="card-title">Store Views</h3>
            <p class="card-content">{{ storeViews }}</p>
        </div>
    </div>
</template>

<style scoped>
/* General Page Layout */
.dashboard-container {
    padding: 2rem;
    background-color: white;
    max-width: 1200px;
    margin: 0 auto;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Header Styling */
.header-container {
    text-align: center;
    margin-bottom: 2rem;
}

.page-header {
    font-size: 3rem;
    font-weight: bold;
    color: #333;
}

.page-subheader {
    font-size: 1.25rem;
    color: #555;
}

/* Cursive Writing Notification Banner */
.notification-banner {
    background-color: #f9f9f9;
    border-left: 4px solid #333;
    padding: 1rem 2rem;
    margin-bottom: 2rem;
    border-radius: 8px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
}

.notification-banner .cursive-writing {
    font-size: 1.25rem;
    color: #333;
}

.notification-banner button {
    position: absolute;
    top: 0.5rem;
    right: 1rem;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #333;
    cursor: pointer;
}

.notification-banner button:hover {
    color: #888;
}

/* Period Selection */
.period-selection {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    text-align: center;
    padding: 3px;
    background: rgb(0,0,0,0.05);
    border-radius: 8px;
}

.period-label {
    font-size: 1.25rem;
    font-weight: bold;
    color: #333;
}

.period-options {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.period-option {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    border-radius: 8px;
    margin: 0;
}

.period-option:hover {
    background-color: #f1f1f1;
}

.period-option.active {
    background-color: #333;
    color: white;
}

.custom-period-picker {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    justify-content: center;
}

.custom-date-picker {
    padding: 0.75rem;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.to-date {
    font-size: 1rem;
    color: #333;
}

/* Analytics Section */
.analytics-section {
    padding: 2rem;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.section-header {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 2rem;
    text-align: center;
}

/* Tabs (Interactive) */
.tabs {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.tab {
    padding: 1rem 2rem;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    border-radius: 8px;
    margin: 0 0.5rem;
}

.tab:hover {
    background-color: #f1f1f1;
}

.tab.active {
    background-color: #333;
    color: white;}

    /* Analytics Cards */
    .analytics-card {
        padding: 2rem;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        text-align: center;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .analytics-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
    }

    .card-content {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }
</style>
