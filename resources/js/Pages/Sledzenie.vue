<script setup>
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

defineProps({
    order: Object,
})
</script>

<template>
    <MainLayout>

        <Head title="Śledzenie zamówienia" />

        <div class="w-full text-center py-16 text-4xl">
            <p class="mb-4">Zamówienie nr {{ order.id }}</p>
            <p>Status: {{ order.status }}</p>
        </div>

    </MainLayout>
</template>
