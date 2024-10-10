<template>
    <Layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ friend.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <chat-component
                            :friend="friend"
                            :current-user="currentUser"
                        />
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
export default {
    props: {
        friend: Object,
        currentUser: Object,
    },
};
</script>

<style scoped>
/* Add any specific styles if needed */
</style>
