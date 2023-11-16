<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const products = [
    { name: "Pizza Margherita", image: "gallery-img1.jpg" },
    { name: "Pizza Pepperoni", image: "gallery-img2.jpg" },
    { name: "Pizza Hawajska", image: "gallery-img3.jpg" },
    { name: "Pizza Margherita", image: "gallery-img1.jpg" },
    { name: "Pizza Pepperoni", image: "gallery-img2.jpg" },
    { name: "Pizza Hawajska", image: "gallery-img3.jpg" },
];
</script>

<template>
    <MainLayout>

        <Head title="Menu" />
        
        <div class="flex flex-col gap-8 items-center py-10">
            <h2 class="text-3xl">Nasze produkty</h2>
            <div class="grid grid-cols-3 gap-5">
                <template v-for="product in products">
                    <div class="flex flex-col gap-3">
                        <img :src="'/images/' + product.image" :alt="product.name" class="w-128 h-64" />
                        <div class="text-center font-bold text-xl">{{ product.name }}</div>
                        <div class="self-center bg-green-500 text-white text-center p-2">ZAMÓW</div>
                    </div>
                </template>
            </div>
        </div>
    </MainLayout>
</template>
