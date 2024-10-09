<template>
    <div>
        <h1>Contract Details</h1>
        <p><strong>Title:</strong> {{ contract.title }}</p>
        <p><strong>Price:</strong> {{ contract.price }}</p>
        <p><strong>Details:</strong> {{ contract.details }}</p>
        <Link :href="route('contracts.index')">Back to Contracts</Link>
    </div>
</template>

<script>
export default {
    props: {
        contract: Object,
    },
};
</script>
