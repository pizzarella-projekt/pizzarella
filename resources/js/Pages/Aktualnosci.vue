<script setup>
import moment from 'moment';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    posts: Array,
});
</script>

<template>
    <MainLayout>

        <Head title="Aktualności" />

        <div class="flex flex-col gap-8 items-center py-10">
            <h2 class="text-3xl">Aktualności</h2>
            <div class="flex flex-col items-center gap-8 w-full">
                <div v-for="post in posts" class="flex gap-4 w-full max-w-6xl bg-green-200 p-8 rounded-xl">
                    <img :src="'/storage/posts/' + post.id + '.png'" alt="Zdjęcie" class="w-[200px]">
                    <div class="flex flex-col flex-grow">
                        <h3 class="text-3xl mb-1">{{ post.title }}</h3>
                        <p class="text-sm mb-2">{{ moment(post.created_at).format('DD.MM.YYYY') }}</p>
                        <p class="text-lg">{{ post.body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
