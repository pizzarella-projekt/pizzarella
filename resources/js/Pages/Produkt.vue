<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import { fakerPL as faker } from '@faker-js/faker';
import MainLayout from '@/Layouts/MainLayout.vue';

const product = {
    name: "Pizza Margherita",
    image: "gallery-img1.jpg",
    description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.",
    prices: [
        { size: "Mała", price: 20 },
        { size: "Średnia", price: 30 },
        { size: "Duża", price: 40 },
    ]
};

const selectedOption = ref(product.prices[0]);
</script>

<template>
    <MainLayout>

        <Head title="Pizza" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="flex flex-col gap-8">
                <div class="flex gap-4 max-w-6xl bg-[#22c55e] p-8 text-white">
                    <img :src="'/images/' + product.image" :alt="product.name">
                    <div class="flex flex-col">
                        <h3 class="text-5xl mb-4 text-white">{{ product.name }}</h3>
                        <div class="mb-1 ">Rozmiar</div>
                        <select v-model="selectedOption" name="rozmiar" id="rozmiar" class="text-black mb-6">
                            <option v-for="option in product.prices" :value="option" @click="selectedOption = option">
                                {{ option.size }}
                            </option>
                        </select>
                        <div class="text-4xl self-center">Cena: {{ selectedOption.price }} zł</div>
                        <a href="/menu/id"
                            class="self-center bg-white text-[#22c55e] text-2xl text-center font-bold p-2 mt-6">ZAMÓW</a>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
