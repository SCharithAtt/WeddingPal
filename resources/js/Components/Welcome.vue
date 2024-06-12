<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Inertia } from '@inertiajs/inertia';

function goToEditVendorProfile() {
    Inertia.visit(route('editVendorProfile'));
}
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <ApplicationLogo class="block h-12 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to your WeddingPal Dashboard!!
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                Here you can easily manage your public vendor profile which will be listed on the WeddingPal Vendors Directory.
            </p>
        </div>


        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div>
                <div class="flex items-center">

                </div>



                <div>
                    <div class="flex items-center">

                        <h2 class="ms-3 text-xl font-semibold text-gray-900">
                            <a>Profile Info</a>
                        </h2>
                    </div>

                    <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                        Vendor Name: {{VendorName}}
                        <br>
                        Contact Number: {{contactNumber}}
                        <br>
                        Location: {{address}}
                        <br>
                        Description: {{bio}}
                        <br>
                    </p>


                </div>
            </div>


                <div>
                <div class="flex items-center">

                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        <a>Set Up Profile Info</a>
                    </h2>
                </div>

                    <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                        <a @click.prevent="goToEditVendorProfile" class="text-blue-500 hover:text-blue-700 font-semibold underline">Click here to change vendor profile information.</a>

                    </p>

            </div>
        </div>






    </div>






</template>

