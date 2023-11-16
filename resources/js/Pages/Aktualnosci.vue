<script setup>
import { Head } from '@inertiajs/vue3';
import { fakerPL as faker } from '@faker-js/faker';
import MainLayout from '@/Layouts/MainLayout.vue';

const posts = () => {
    const posts = [];

    for (let i = 0; i < 10; i++) {
        posts.push({
            title: faker.lorem.sentence({ min: 4, max: 10 }),
            date: faker.date.anytime().toLocaleDateString("pl-PL"),
            category: "Aktualności",
            image: "https://picsum.photos/200/200",
            description: faker.lorem.lines({ min: 2, max: 5 }),
        });
    }

    return posts;
};
</script>

<template>
    <MainLayout>

        <Head title="Aktualności" />

        <div class="flex flex-col gap-8 items-center py-10">
            <h2 class="text-3xl">Aktualności</h2>
            <div class="flex flex-col gap-8">
                <div v-for="post in posts()" class="flex gap-4 max-w-6xl bg-green-200 p-8 rounded-xl">
                    <img :src="post.image" alt="Zdjęcie">
                    <div class="flex flex-col">
                        <h3 class="text-3xl mb-1">{{ post.title }}</h3>
                        <p class="text-sm mb-2">{{ post.category }} | {{ post.date }}</p>
                        <p class="text-lg">{{ post.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
