<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    product: Object,
});

const product = props.product;

const form = useForm({
    name: product.name,
    description: product.description,
    small: product.small,
    medium: product.medium,
    big: product.big,
    image: null,
});
</script>

<template>
    <AdminLayout>

        <Head title="Edytuj produkt" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div>Edytowanie produktu</div>
                </div>
                <form @submit.prevent="form.post(route('menu.update', product.id) + '?_method=PUT')"
                    class="flex flex-col gap-8 w-full bg-white p-8">
                    <div class="flex flex-col">
                        <label for="name">Nazwa produktu</label>
                        <input type="text" id="name" v-model="form.name">
                        <div v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</div>
                    </div>
                    <div class="flex flex-col">
                        <label for="description">Opis produktu</label>
                        <textarea id="description" v-model="form.description"></textarea>
                        <div v-if="form.errors.description" class="text-red-500">{{ form.errors.description }}</div>
                    </div>
                    <div class="flex flex-col">
                        <label for="small">Cena małej pizzy</label>
                        <input type="text" id="small" v-model="form.small">
                        <div v-if="form.errors.small" class="text-red-500">{{ form.errors.small }}</div>
                    </div>
                    <div class="flex flex-col">
                        <label for="medium">Cena średniej pizzy</label>
                        <input type="text" id="medium" v-model="form.medium">
                        <div v-if="form.errors.medium" class="text-red-500">{{ form.errors.medium }}</div>
                    </div>
                    <div class="flex flex-col">
                        <label for="big">Cena dużej pizzy</label>
                        <input type="text" id="big" v-model="form.big">
                        <div v-if="form.errors.big" class="text-red-500">{{ form.errors.big }}</div>
                    </div>
                    <div class="flex flex-col">
                        <label for="image">Zdjęcie produktu</label>
                        <input type="file" id="image" @input="form.image = $event.target.files[0]">
                        <div v-if="form.errors.image" class="text-red-500">{{ form.errors.image }}</div>
                    </div>
                    <button type="submit" :disabled="form.processing" class="bg-green-500 text-white px-4 py-2 rounded">
                        Aktualizuj produkt
                    </button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
