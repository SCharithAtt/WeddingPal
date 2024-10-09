<template>
    <div>
        <h1>Wedding</h1>
        <Link v-if="!wedding" :href="route('weddings.create')">Create Wedding</Link>
        <div v-else>
            <h2>Details</h2>
            <p><strong>Date:</strong> {{ wedding.date }}</p>
            <p><strong>Location:</strong> {{ wedding.location }}</p>
            <p><strong>Details:</strong> {{ wedding.details }}</p>
            <Link :href="route('weddings.edit')">Edit Wedding</Link>
            <Link :href="route('contracts.index')">View Contracts</Link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        wedding: Object,
    },
};
</script>
