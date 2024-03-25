
<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import { ref, watch, defineProps } from 'vue';

    defineProps({ clients: Object })
    
    const search = ref('');

    watch(search, value => {
        router.get('/clients', {search: value}, { preserveState: true, replace: true });
    });
</script>

<template>
    <GuestLayout>
        <Head title="Existing Clients" />

        <h2 class="text-center text-gray-900 text-xl font-bold mb-4">Existing Profile</h2>
        <input 
            type="text"
            v-model="search"
            placeholder="Search by last name"
            class="px-8 py-3 w-full mb-4 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
        >

        <ol class="list-decimal" v-if="$page.props.clients">
            <li v-for="client in $page.props.clients" :key="client.id">
                <Link
                    :href="route('client', [client.id])"
                    class=" text-gray-900 hover:text-gray-500"
                >
                    {{ client.first_name }} {{ client.last_name }}
                </Link>
            </li>
        </ol>
        
    </GuestLayout>
</template>
