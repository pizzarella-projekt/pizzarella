<script setup>
import moment from 'moment';
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    posts: Array,
});

const deletePost = (id) => {
    router.delete(route('aktualnosci.destroy', id));
}
</script>

<template>
    <AdminLayout>

        <Head title="Aktualności" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-2 mb-4">
                    <Link :href="route('aktualnosci.create')" class="bg-green-500 text-white px-4 py-2 rounded">
                    Dodaj post
                    </Link>
                </div>
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div class="">Id</div>
                    <div class="flex-grow">Tytuł</div>
                    <div class="min-w-[150px]">Data dodania</div>
                    <div class="min-w-[200px]">Akcje</div>
                </div>
                <div v-for="post in posts" :key="post.id" class="flex gap-8 w-full bg-white p-8">
                    <div class="">{{ post.id }}</div>
                    <div class="flex-grow">{{ post.title }}</div>
                    <div class="min-w-[150px]">{{ moment(post.created_at).format('DD.MM.YYYY') }}</div>
                    <div class="flex gap-2 min-w-[200px]">
                        <Link :href="route('aktualnosci.edit', post.id)" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Edytuj
                        </Link>
                        <button @click="deletePost(post.id)" class="bg-red-500 text-white px-4 py-2 rounded">
                            Usuń
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
