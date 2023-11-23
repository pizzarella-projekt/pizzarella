<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const products = [
    { id: "1", name: "Pizza Margherita", image: "gallery-img1.jpg" },
    { id: "2", name: "Pizza Pepperoni", image: "gallery-img2.jpg" },
    { id: "3", name: "Pizza Hawajska", image: "gallery-img3.jpg" },
    { id: "4", name: "Pizza Margherita", image: "gallery-img1.jpg" },
    { id: "5", name: "Pizza Pepperoni", image: "gallery-img2.jpg" },
    { id: "6", name: "Pizza Hawajska", image: "gallery-img3.jpg" },
];
</script>

<template>
    <AdminLayout>

        <Head title="Menu" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-2 mb-4">
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Dodaj produkt</button>
                </div>
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div class="">Id</div>
                    <div class="flex-grow">Nazwa produktu</div>
                    <div class="min-w-[200px]">Akcje</div>
                </div>
                <div v-for="product in products" :key="product.id" class="flex gap-8 w-full bg-white p-8">
                    <div class="">{{ product.id }}</div>
                    <div class="flex-grow">{{ product.name }}</div>
                    <div class="flex gap-2 min-w-[200px]">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Edytuj</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded">Usuń</button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
