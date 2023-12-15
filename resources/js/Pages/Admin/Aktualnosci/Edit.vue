<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    post: Object,
});

const post = props.post;

const form = useForm({
    title: post.title,
    body: post.body,
    image: null,
});
</script>

<template>
    <AdminLayout>

        <Head title="Edytuj produkt" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div>Edytowanie postu</div>
                </div>
                <form @submit.prevent="form.post(route('aktualnosci.update', post.id) + '?_method=PUT')"
                    class="flex flex-col gap-8 w-full bg-white p-8">
                    <div class="flex flex-col">
                        <label for="title">Tytuł</label>
                        <input type="text" id="title" v-model="form.title">
                        <div v-if="form.errors.title" class="text-red-500">{{ form.errors.title }}</div>
                    </div>
                    <div class="flex flex-col">
                        <label for="body">Treść</label>
                        <textarea id="body" v-model="form.body"></textarea>
                        <div v-if="form.errors.body" class="text-red-500">{{ form.errors.body }}</div>
                    </div>
                    <div class="flex flex-col">
                        <label for="image">Zdjęcie</label>
                        <input type="file" id="image" @input="form.image = $event.target.files[0]">
                        <div v-if="form.errors.image" class="text-red-500">{{ form.errors.image }}</div>
                    </div>
                    <button type="submit" :disabled="form.processing" class="bg-green-500 text-white px-4 py-2 rounded">
                        Aktualizuj post
                    </button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
