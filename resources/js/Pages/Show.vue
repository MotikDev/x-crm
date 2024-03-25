
<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    defineProps({ client: Array })
</script>

<template>
    <GuestLayout>
        <Head title="Existing Clients" />

        <h2 class="text-center text-gray-900 text-xl font-bold mb-4">{{ client.first_name }} {{ client.last_name }}'s Profile</h2>
        <div class="flex flex-col sm:justify-center items-center">
            <img :src="client.profile_image" alt="" srcset="">
        </div>
        
        <div class="grid gap-2 mt-4">
            <p>First Name: {{ client.first_name }}</p>
            <p>Last Name: {{ client.last_name }}</p>
            <p>Email: {{ client.email }}</p>
            <p>Primary Legal Counsel: {{ client.primary_legal_counsel }}</p>
            <p>Date of Birth: {{ client.dob }}</p>
            <p>Case Details: {{ client.case_details }}</p>
            <p>Date Profiled: {{ client.created_at.split('T')[0] }}</p>
        </div>


        
    </GuestLayout>
</template>
