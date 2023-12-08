<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const images = () => {
    const images = [];
    for (let i = 0; i < 30; i++) {
        images.push({
            url: "https://picsum.photos/seed/picsum" + i + "/350/200",
        });
    }
    return images;
};
</script>

<template>
    <AdminLayout>

        <Head title="Galeria" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-2 mb-4">
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Dodaj zdjęcie</button>
                </div>
                <div class="text-center w-full bg-blue-500 p-4 text-white font-bold text-2xl">
                    Galeria
                </div>
                <div class="flex flex-wrap justify-center gap-5 w-full bg-white p-8">
                    <div v-for="image in images()" class="flex flex-col items-center gap-2 border border-gray-700 p-2">
                        <img :src="image.url" alt="Zdjęcie">
                        <button class="bg-red-500 text-white px-4 py-2 rounded">Usuń</button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
