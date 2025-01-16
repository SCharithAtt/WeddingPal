<template>
    <div class="container">
        <!-- Title -->
        <h2 class="section-header">Vendor Information</h2>

        <!-- General Information Section -->
        <div class="section">
            <h3 class="section-title">General Information</h3>
            <div class="section-content">
                <div class="info-item">
                    <span><strong>Store Name:</strong></span>
                    <span>{{ vendor.store_name }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Store Email:</strong></span>
                    <span>{{ vendor.store_email }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Store Address:</strong></span>
                    <span>{{ formattedAddress }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Store Contact:</strong></span>
                    <span>{{ vendor.store_contact }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Category:</strong></span>
                    <span>{{ vendor.category }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Price Bracket:</strong></span>
                    <span>{{ vendor.price_bracket }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Service Area:</strong></span>
                    <span>{{ vendor.service_area }}</span>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="section">
            <h3 class="section-title">Description</h3>
            <div class="section-content">
                <div class="info-item">
                    <span><strong>Bio:</strong></span>
                    <span>{{ vendor.bio }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Description:</strong></span>
                    <span>{{ vendor.description }}</span>
                </div>
            </div>
        </div>

        <!-- Bank Details Section -->
        <div class="section">
            <h3 class="section-title">Bank Details</h3>
            <div class="section-content">
                <div class="info-item">
                    <span><strong>Bank Account Number:</strong></span>
                    <span>{{ vendor.bank_account_number }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Bank Name:</strong></span>
                    <span>{{ vendor.bank_name }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Branch:</strong></span>
                    <span>{{ vendor.branch }}</span>
                </div>
                <div class="info-item">
                    <span><strong>Account Name:</strong></span>
                    <span>{{ vendor.account_name }}</span>
                </div>
            </div>
        </div>

        <!-- Operating Hours Section -->
        <div class="section">
            <h3 class="section-title">Operating Hours</h3>
            <div class="section-content">
                <p v-if="vendor.open_hours">{{ vendor.open_hours }}</p>
                <p v-else>No operating hours specified.</p>
            </div>
        </div>

        <!-- Terms & Conditions Section -->
        <div class="section">
            <h3 class="section-title">Terms & Conditions</h3>
            <div class="section-content">
                <p>{{ vendor.terms_conditions }}</p>
            </div>
        </div>

        <!-- Online Presence Section -->
        <div class="section">
            <h3 class="section-title">Online Presence</h3>
            <div class="section-content">
                <div class="info-item">
                    <span><strong>Website URL:</strong></span>
                    <a :href="vendor.website_url" class="link" target="_blank">{{ vendor.website_url }}</a>
                </div>
                <div class="info-item">
                    <span><strong>Facebook Link:</strong></span>
                    <a :href="vendor.facebook_link" class="link" target="_blank">{{ vendor.facebook_link }}</a>
                </div>
                <div class="info-item">
                    <span><strong>Instagram Link:</strong></span>
                    <a :href="vendor.instagram_link" class="link" target="_blank">{{ vendor.instagram_link }}</a>
                </div>
            </div>
        </div>

        <!-- Edit Button -->
        <button @click="openEditModal" class="btn">Edit</button>

        <!-- Edit Modal -->
        <div v-if="isEditing" class="modal-overlay" @click="closeModal">
            <div class="modal-content" @click.stop>
                <button @click="closeModal" class="btn-close">✖</button>
                <h3 class="section-header">Edit Vendor Info</h3>
                <form @submit.prevent="updateVendor">
                    <div class="form-group">
                        <label for="store_name">Store Name:</label>
                        <input v-model="editedVendor.store_name" id="store_name" class="input-field" />
                    </div>
                    <div class="form-group">
                        <label for="store_email">Store Email:</label>
                        <input v-model="editedVendor.store_email" id="store_email" class="input-field" />
                    </div>
                    <div class="form-group">
                        <label for="store_address">Store Address:</label>
                        <input v-model="editedVendor.store_address" id="store_address" class="input-field" />
                    </div>
                    <div class="form-group">
                        <label for="store_contact">Store Contact:</label>
                        <input v-model="editedVendor.store_contact" id="store_contact" class="input-field" />
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input v-model="editedVendor.category" id="category" class="input-field" />
                    </div>
                    <div class="form-group">
                        <label for="price_bracket">Price Bracket:</label>
                        <input v-model="editedVendor.price_bracket" id="price_bracket" class="input-field" />
                    </div>
                    <div class="form-group">
                        <label for="service_area">Service Area:</label>
                        <input v-model="editedVendor.service_area" id="service_area" class="input-field" />
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio:</label>
                        <textarea v-model="editedVendor.bio" id="bio" class="input-field" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea v-model="editedVendor.description" id="description" class="input-field" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn">Save</button>
                </form>
            </div>
        </div>

        <!-- Store Preview -->
        <div class="store-preview">
            <h1 class="section-header">This is how your store is listed</h1>
            <VendorSummary :vendor="vendor" />
        </div>

        <div class="store-preview">
            <h1 class="section-header">This is how your Store's full page look..</h1>
            <FullVendor :vendor="vendor" />
        </div>
    </div>
</template>

<script setup>
import { ref, toRefs, computed } from 'vue';
import { defineProps } from 'vue';
import VendorLayout from "@/Layouts/VendorLayout.vue";
import VendorSummary from "@/Pages/Client/Market/VendorSummary.vue";
import FullVendor from "@/Pages/Client/Market/FullVendor.vue";

const props = defineProps({
    vendor: Object
});

const { vendor } = toRefs(props);
const isEditing = ref(false);
const editedVendor = ref({ ...vendor.value });

const openEditModal = () => {
    editedVendor.value = { ...vendor.value }; // Reset to original vendor info
    isEditing.value = true;
};

const closeModal = () => {
    isEditing.value = false;
};

const updateVendor = () => {
    console.log('Updated vendor:', editedVendor.value);
    closeModal();
};

const formattedAddress = computed(() => {
    const address = JSON.parse(vendor.value.store_address);
    return `${address.street}, ${address.city}, ${address.district}, ${address.province}`;
});

defineOptions({
    layout: VendorLayout,
});
</script>

<style scoped>
/* General Layout */
.container {
    padding: 24px;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Title Header */
.section-header {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    color: #000;
    margin-bottom: 24px;
}

/* Section Title */
.section-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #000;
    margin-bottom: 12px;
}

/* Section Content */
.section-content {
    margin-bottom: 24px;
}

.info-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
}

/* Links */
.link {
    color: #000;
    text-decoration: none;
    border-bottom: 1px solid #000;
}

.link:hover {
    text-decoration: underline;
}

/* Button Styling */
.btn {
    display: block;
    width: 100%;
    padding: 12px;
    margin-top: 24px;
    background-color: #000;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #333;
}

/* Modal Styling */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 24px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    position: relative;
}

/* Close Button */
.btn-close {
    position: absolute;
    top: 8px;
    right: 8px;
    background-color: transparent;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
}

/* Form Field Styling */
.form-group {
    margin-bottom: 16px;
}

.input-field {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-top: 8px;
}

textarea.input-field {
    resize: vertical;
}

/* Store Preview */
.store-preview {
    margin-top: 40px;
    text-align: center;
}
</style>
