<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-60 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div class="my-4 text-center text-blue-800" >
            <Link href="/">
                Home
            </Link> <br>
            <Link href="/clients">
                All Clients
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 mb-20 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
