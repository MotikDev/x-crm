<script setup>
defineProps({
    value: {
        type: String,
    },
    required: {
        type: Boolean,
    },
});
</script>

<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-if="required" class="ml-1 text-red-500" >*</span>
        <span v-else><slot /></span>
    </label>
</template>
