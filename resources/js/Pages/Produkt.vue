<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    product: Object,
});

const product = ref(props.product);

const options = [
    { name: "Mała", price: product.value.small },
    { name: "Średnia", price: product.value.medium },
    { name: "Duża", price: product.value.big },
];

const selectedOption = ref(options[0]);
</script>

<template>
    <MainLayout>

        <Head title="Pizza" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="flex gap-4 w-full max-w-6xl bg-[#22c55e] p-8 text-white">
                <img :src="'/storage/products/' + product.id + '.png'" :alt="product.name" class="max-w-[600px]">
                <div class="flex flex-col flex-grow">
                    <h3 class="text-5xl mb-4 text-white text-center">{{ product.name }}</h3>
                    <div class="text-center mb-4">{{ product.description }}</div>
                    <div class="mb-1 ">Rozmiar</div>
                    <select v-model="selectedOption" name="rozmiar" id="rozmiar" class="text-black mb-6">
                        <option v-for="option in options" :value="option" @click="selectedOption = option">
                            {{ option.name }}
                        </option>
                    </select>
                    <div class="text-4xl self-center">Cena: {{ selectedOption.price }}</div>
                    <a href="/menu"
                        class="self-center bg-white text-[#22c55e] text-2xl text-center font-bold p-2 mt-6">ZAMÓW</a>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
