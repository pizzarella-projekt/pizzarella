<script setup>
import { Head } from '@inertiajs/vue3';
import { fakerPL as faker } from '@faker-js/faker';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const posts = () => {
    return Array.from({ length: 6 }, (_, i) => ({
        id: i + 1,
        title: faker.lorem.sentence({ min: 4, max: 10 }),
        date: faker.date.anytime().toLocaleDateString("pl-PL"),
        category: "Aktualności",
        image: "https://picsum.photos/200/200",
        description: faker.lorem.lines({ min: 2, max: 5 }),
    }));
};
</script>

<template>
    <AdminLayout>

        <Head title="Aktualności" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-2 mb-4">
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Nowy post</button>
                </div>
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div class="">Id</div>
                    <div class="flex-grow">Tytuł</div>
                    <div class="min-w-[150px]">Data dodania</div>
                    <div class="min-w-[200px]">Akcje</div>
                </div>
                <div v-for="post in posts()" :key="post.id" class="flex gap-8 w-full bg-white p-8">
                    <div class="">{{ post.id }}</div>
                    <div class="flex-grow">{{ post.title }}</div>
                    <div class="min-w-[150px]">{{ post.date }}</div>
                    <div class="flex gap-2 min-w-[200px]">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Edytuj</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded">Usuń</button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
