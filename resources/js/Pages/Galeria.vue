<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({ images: Array });
</script>

<template>
    <MainLayout>

        <Head title="Galeria" />

        <div class="flex flex-col gap-8 items-center py-10">
            <h2 class="text-3xl">Galeria</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <div v-for="image in images" class="">
                    <img :src="'/storage/' + image" alt="Zdjęcie" class="max-w-[300px]">
                </div>
            </div>
        </div>
    </MainLayout>
</template>
