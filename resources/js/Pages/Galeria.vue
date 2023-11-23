<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const images = () => {
    const images = [];
    for (let i = 0; i < 30; i++) {
        images.push({
            url: "https://picsum.photos/seed/picsum" + i + "/400/200",
        });
    }
    return images;
};
</script>

<template>
    <MainLayout>

        <Head title="Galeria" />

        <div class="flex flex-col gap-8 items-center py-10">
            <h2 class="text-3xl">Galeria</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <div v-for="image in images()" class="">
                    <img :src="image.url" alt="Zdjęcie">
                </div>
            </div>
        </div>
    </MainLayout>
</template>
