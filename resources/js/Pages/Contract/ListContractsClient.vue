<template>
    <div>
        <h1>Contracts</h1>
        <Link :href="route('contracts.create')">Create Contract</Link>
        <ul>
            <li v-for="contract in contracts" :key="contract.id">
                <Link :href="route('contracts.show', contract.id)">{{ contract.title }}</Link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        contracts: Array,
    },
};
</script>
