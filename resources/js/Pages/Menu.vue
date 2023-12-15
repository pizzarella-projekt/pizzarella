<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    products: Array,
});
</script>

<template>
    <MainLayout>

        <Head title="Menu" />

        <div class="flex flex-col gap-8 items-center py-10">
            <h2 class="text-3xl">Nasze produkty</h2>
            <div class="grid grid-cols-3 gap-5">
                <template v-for="product in products">
                    <Link :href="`/menu/${product.id}`" class="flex flex-col gap-3">
                    <img :src="'/storage/products/' + product.id + '.png'" :alt="product.name" class="w-128 h-64" />
                    <div class="text-center font-bold text-xl">{{ product.name }}</div>
                    <div class="self-center bg-green-500 text-white text-center p-2">ZAMÓW</div>
                    </Link>
                </template>
            </div>
        </div>
    </MainLayout>
</template>
